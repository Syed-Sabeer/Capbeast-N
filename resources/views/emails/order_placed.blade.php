


<!DOCTYPE html>
<html>
<head>
    <title>Your Order Has Been Placed!</title>
</head>
<body>



@if($order->user->language == 'fr')
<h2>Cher, {{ $order->user->first_name ?? 'Client précieux' }}!</h2>

<h3>Merci d'avoir acheté Monkey Beanies. Nous sommes heureux de confirmer votre commande # <strong>{{ $order->order_id ?? 'N/A' }}</strong></h3>
<h4>Détails de la commande:</h4>
@if(isset($order->items) && $order->items->isNotEmpty())
    <ul>
        @foreach($order->items as $items)
            <li>
                <strong>Product:</strong> {{ $items->product->title ?? 'Unknown Product' }} <br>
                <strong>Quantity:</strong> {{ $items->quantity ?? 'N/A' }} <br>
                <strong>Price:</strong> ${{ $items->product_price ?? '0.00' }}
            </li>
        @endforeach
    </ul>
@else
    <p>Aucun article trouvé dans cette commande.</p>
@endif

<p><strong>Total Price:</strong> ${{ $order->total_price ?? '0.00' }}</p>

<h3>Détails d'expédition:</h3>
@if(isset($order->shippingDetails))
    <p>
        Name: {{ $order->shippingDetails->firstname ?? 'N/A' }} {{ $order->shippingDetails->lastname ?? '' }} <br>
        Address: {{ $order->shippingDetails->address ?? 'N/A' }} <br>
        Email: {{ $order->shippingDetails->email ?? 'N/A' }} <br>
        Phone: {{ $order->shippingDetails->phone ?? 'N/A' }}
    </p>
@else
    <p>Détails d'expédition non disponibles.</p>
@endif

<p>Si vous avez des questions ou avez besoin d'un soutien supplémentaire, n'hésitez pas à nous contacter. Nous apprécions votre entreprise.<br>Sincèrement,</p>

<h4>Bruno Torres</h4>
<h4>PDG</h4>


@else

<h2>Dear, {{ $order->user->first_name ?? 'Valued Customer' }}!</h2>
<h3>Thank you for purchasing from Monkey Beanies. We are pleased to confirm your order # <strong>{{ $order->order_id ?? 'N/A' }}</strong></h3>
<h4>Order Details:</h4>
@if(isset($order->items) && $order->items->isNotEmpty())
    <ul>
        @foreach($order->items as $items)
            <li>
                <strong>Product:</strong> {{ $items->product->title ?? 'Unknown Product' }} <br>
                <strong>Quantity:</strong> {{ $items->quantity ?? 'N/A' }} <br>
                <strong>Price:</strong> ${{ $items->product_price ?? '0.00' }}
            </li>
        @endforeach
    </ul>
@else
    <p>No items found in this order.</p>
@endif

<p><strong>Total Price:</strong> ${{ $order->total_price ?? '0.00' }}</p>

<h3>Shipping Details:</h3>
@if(isset($order->shippingDetails))
    <p>
        Name: {{ $order->shippingDetails->firstname ?? 'N/A' }} {{ $order->shippingDetails->lastname ?? '' }} <br>
        Address: {{ $order->shippingDetails->address ?? 'N/A' }} <br>
        Email: {{ $order->shippingDetails->email ?? 'N/A' }} <br>
        Phone: {{ $order->shippingDetails->phone ?? 'N/A' }}
    </p>
@else
    <p>Shipping details not available.</p>
@endif

<p>Should you have any questions or require additional support, please don't hesitate to get in touch with us. We appreciate your business. <br>Sincerely, </p>

<h4>Bruno Torres</h4>
<h4>CEO</h4>

@endif



    <a href="https://monkeybeanies.com/">Monkey Beanies</a>

</body>
</html>