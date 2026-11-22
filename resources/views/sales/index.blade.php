<h1>Sales History</h1>

<p>
    <a href="{{ route('home') }}">Home</a> |
    <a href="{{ route('products.index') }}">Products</a> |
    <a href="{{ route('customers.index') }}">Customers</a> |
    <a href="{{ route('users.index') }}">Staff</a>
</p>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<p><a href="{{ route('sales.create') }}">+ Record Sale</a></p>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Product</th>
            <th>Customer</th>
            <th>Staff</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Transaction Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($sales as $sale)
            <tr>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->customer?->full_name ?? 'Walk-in Customer' }}</td>
                <td>{{ $sale->user->full_name ?? $sale->user->name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>₱{{ number_format($sale->total_price, 2) }}</td>
                <td>{{ $sale->created_at->format('F j, Y h:i A') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No sales recorded yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>