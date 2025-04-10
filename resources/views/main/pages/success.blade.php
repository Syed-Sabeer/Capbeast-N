<div class="order-summary">
    <h3>Order Summary</h3>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

    <h4>Shipping Details</h4>
    <p><strong>Service:</strong> {{ $order->shipping_service }}</p>
    <p><strong>Estimated Delivery:</strong> {{ $order->shipping_estimated_days }} days</p>
    <p><strong>Shipping Cost:</strong> ${{ number_format($order->shipping_price, 2) }}</p>

    <h4>Price Breakdown</h4>
    <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
    @if ($order->discount_amount > 0)
        <p><strong>Discount:</strong> -${{ number_format($order->discount_amount, 2) }}</p>
    @endif
    <p><strong>Shipping:</strong> ${{ number_format($order->shipping_price, 2) }}</p>
    <p><strong>TPS Tax:</strong> ${{ number_format($order->tps_tax_amount, 2) }}</p>
    <p><strong>TVQ Tax:</strong> ${{ number_format($order->tvq_tax_amount, 2) }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->final_total, 2) }}</p>
</div>

<style>
    .order-summary {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .order-summary h3 {
        color: #333;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        border-bottom: 2px solid #eee;
        padding-bottom: 0.5rem;
    }

    .order-details {
        display: grid;
        gap: 1.5rem;
    }

    .order-details p {
        margin: 0.5rem 0;
        color: #666;
    }

    .order-details strong {
        color: #333;
    }

    .shipping-details {
        background-color: #f8f9fa;
        padding: 1.5rem;
        border-radius: 6px;
        margin: 1rem 0;
    }

    .shipping-details h4 {
        color: #333;
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .price-breakdown {
        border-top: 2px solid #eee;
        padding-top: 1.5rem;
        margin-top: 1rem;
    }

    .price-breakdown p {
        display: flex;
        justify-content: space-between;
        margin: 0.5rem 0;
    }

    .price-breakdown .total {
        font-size: 1.2rem;
        color: #333;
        border-top: 2px solid #eee;
        padding-top: 1rem;
        margin-top: 1rem;
    }
</style>
