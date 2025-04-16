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
    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>

    <h3>Products Ordered:</h3>
    @if (isset($order->items) && $order->items->isNotEmpty())
        <table style="width: 100%;border-collapse: collapse;" cellspacing="0" cellpadding="0">
            @foreach ($order->items as $item)
                <tr>
                    <td style="padding: 12px 5px; vertical-align: top;">
                        <strong>{{ $item->product->title ?? 'Unknown Product' }}</strong>
                    </td>
                    <td style="padding: 12px 5px; vertical-align: top;">
                        <strong>Qty:</strong> {{ $item->quantity ?? 'N/A' }}
                    </td>
                    <td style="padding: 12px 5px; vertical-align: top;text-align: end;">
                        <strong>Price:</strong> ${{ number_format($item->product_price, 2) ?? '0.00' }}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No items found in this order.</p>
    @endif

    <h3>Shipping Information:</h3>
    <p><strong>Tracking Number:</strong> {{ $order->shippingRate->tracking_number ?? 'N/A' }}</p>
    <p><strong>Delivery Days:</strong> {{ $order->shippingRate->delivery_days ?? 'N/A' }}</p>

    <p>Please process this order as soon as possible.</p>
</body>

</html>
