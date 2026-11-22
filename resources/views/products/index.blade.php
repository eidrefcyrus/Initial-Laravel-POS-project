<h1>Products</h1>

<p>
    <a href="{{ route('home') }}">Home</a> |
    <a href="{{ route('customers.index') }}">Customers</a> |
    <a href="{{ route('users.index') }}">Staff</a> |
    <a href="{{ route('sales.index') }}">Sales History</a>
</p>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<p><a href="{{ route('products.create') }}">+ Add Product</a></p>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             width="70" height="70"
                             style="object-fit: cover;">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Edit</a>

                    <form action="{{ route('products.destroy', $product) }}"
                          method="POST"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Delete this product?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>