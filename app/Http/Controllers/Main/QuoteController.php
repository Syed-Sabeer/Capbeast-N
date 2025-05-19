<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\UserCustomization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Import Log facade

class QuoteController extends Controller
{
    public function index()
    {
        try {
            $products = Product::select('id', 'title')->get();
            return view('main.pages.quote', compact('products'));
        } catch (Exception $e) {
            Log::error('QuoteController@index error: ' . $e->getMessage());
            abort(500, 'Something went wrong while loading products.');
        }
    }

    public function getProductColors($id)
    {
        try {
            $colors = ProductColor::where('product_id', $id)
                ->where('visibility', 1)
               ->get(['id', 'color_name_1', 'color_code_1', 'front_image', 'back_image', 'right_image', 'left_image']);


            return response()->json(['status' => 'success', 'data' => $colors]);
        } catch (Exception $e) {
            Log::error("QuoteController@getProductColors error for product_id {$id}: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch product colors.']);
        }
    }

 public function submit(Request $request)
{
    try {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:product_color,id',
            'quantity' => 'sometimes|integer|min:1',
            'size' => 'sometimes|string|nullable',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'details' => 'required|string',
        ]);

        $userId = auth()->id();
        if (!$userId) {
            return redirect()->back()->with('error', 'Please login first.');
        }

        // Store in session so CustomizerController can save the quote
        $request->session()->put('quote_form', array_merge($request->all(), [
            'user_id' => $userId
        ]));

        // Create a new request for the customizer controller
        $customizerRequest = new Request([
            'productId' => $request->product_id,
            'colorId' => $request->color_id,
            'userId' => $userId,
            'quantity' => $request->input('quantity', 1),
            'size' => $request->input('size'),
            'from_quote' => 1,
        ]);

        // Manually bind current session and user to the new request
        $customizerRequest->setLaravelSession($request->getSession());
        $customizerRequest->setUserResolver(fn () => auth()->user());

        // Call the CustomizerController's add method
        $response = app(CustomizerController::class)->add($customizerRequest);
        
        // Get the response data
        $responseData = $response->getData(true);
        
        // Handle error responses
        if (isset($responseData['success']) && !$responseData['success']) {
            throw new Exception($responseData['message'] ?? 'Failed to process customization');
        }

        // Handle successful response
        if (isset($responseData['redirect_url'])) {
            return redirect($responseData['redirect_url']);
        }

        if (isset($responseData['data']['id'])) {
            return redirect()->route('customizer.index', ['id' => $responseData['data']['id']]);
        }

        throw new Exception('Invalid response from customizer');

    } catch (Exception $e) {
        \Log::error('QuoteController@submit error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while submitting the quote.')->withInput();
    }
}

}
