<!DOCTYPE html>
<html>

<head>
    <title>Your Order Has Been Placed!</title>
</head>

<body>

    <h2>Dear, {{ $order->user->first_name ?? 'Valued Customer' }}!</h2>
    <h3>Thank you for purchasing from CapBeast. We are pleased to confirm your order #
        <strong>{{ $order->order_id ?? 'N/A' }}</strong></h3>

    <h4>Order Details:</h4>
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
            <tr>
                <td colspan="2" style="padding: 12px 8px; font-size: 15px;border-top: 1px solid #e9ebec;">
                    Total Amount
                </td>
                <td style="padding: 12px 8px; font-size: 15px;text-align: end; border-top: 1px solid #e9ebec;">
                    <strong>${{ number_format($order->total_price, 2) ?? '0.00' }}</strong>
                </td>
            </tr>
        </table>
    @else
        <p>No items found in this order.</p>
    @endif

    <h4>Shipping Information:</h4>
    <p><strong>Tracking Number:</strong> {{ $order->shippingRate->tracking_number ?? 'N/A' }}</p>
    <p><strong>Delivery Days:</strong> {{ $order->shippingRate->delivery_days ?? 'N/A' }}</p>

    <p>Should you have any questions or require additional support, please don't hesitate to get in touch with us. We
        appreciate your business.</p>

    <p>Sincerely,</p>
    <h4>CapBeast Team</h4>

    <a href="https://capbeast.com/">CapBeast</a>

</body>

</html>
