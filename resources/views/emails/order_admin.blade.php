<!DOCTYPE html>
<html>
<head>
    <title>New Order Received</title>
</head>
<body>
    <h2>New Order Received!</h2>
    <p>A new order has been placed on your store.</p>

    <h3>Order Details:</h3>
    <p><strong>Order ID:</strong> {{ $order->order_id }}</p>
    <p><strong>Customer Email:</strong> {{ $order->user->email }} </p>
    <p><strong>Customer Contact:</strong> {{ $order->user->contact_number }} </p>
    <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>

    <h3>Products Ordered:</h3>
    <ul>
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
    </ul>

    <h3>Shipping Details:</h3>
    <p>
        Name: {{ $order->shippingDetails->firstname }} {{ $order->shippingDetails->lastname }} <br>
        Address: {{ $order->shippingDetails->address }} <br>
        Email: {{ $order->shippingDetails->email }} <br>
        Phone: {{ $order->shippingDetails->phone }}
    </p>

    <p>Please process this order as soon as possible.</p>
</body>
</html>
