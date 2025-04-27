@extends('main.layouts.master')

@section('main-container')

@component('main.components.minibreadcrumb', [
    'pageTitle' => 'Wishlist',
    'pageRoute' => 'wishlist',
])
@endcomponent

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table fs-15 table-nowrap align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($wishlist as $item)
                            
                            
                            <tr>
                                <td>
                                    <div class="d-flex gap-3">
                                        <div class="avatar-sm flex-shrink-0">
                                            <div class="avatar-title bg-dark-subtle rounded">
                                                @php
                                                $color = $item->product->productColors->first();
                                                $imagePath = $color->front_image
                                                    ?? $color->right_image
                                                    ?? $color->left_image
                                                    ?? $color->back_image
                                                    ?? 'ProductImages/default.jpg';
                                            @endphp
                                            
                                            <img src="{{ asset('storage/' . $imagePath) }}" alt="" class="avatar-xs">
                                            
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="{{ url('/product/' . $item->product->slug) }}"><h6 class="fs-16">{{$item->product->title}}</h6></a>
                                            <p class="mb-0 text-muted fs-13">
                                                {{ $item->product->categories->pluck('title')->implode(', ') ?: 'N/A' }}
                                            </p>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>${{$item->product->selling_price}}</td>                        
                                <td>
                                    <ul class="list-unstyled d-flex gap-3 mb-0">
                                        <li>
                                            <a href="{{ url('/product/' . $item->product->slug) }}" class="btn btn-soft-info btn-icon btn-sm">
                                                <i class="ri-eye-line fs-13"></i>
                                            </a>
                                            
                                        </li>
                                        <li>
                                            <a href="{{ route('add.user-wishlist', $item->product->id) }}" class="btn btn-soft-danger btn-icon btn-sm"><i class="ri-close-line fs-13"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hstack gap-2 justify-content-end mt-2">
                    <a href="{{ route('cart') }}" class="btn btn-hover btn-secondary">View Cart <i class="ri-arrow-right-line align-bottom"></i></a>
                    
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection