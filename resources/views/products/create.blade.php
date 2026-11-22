<h1>Add Product</h1>

<p><a href="{{ route('products.index') }}">← Back to Products</a></p>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>
        <label>Product Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        <label>Price</label><br>
        <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}">
    </p>

    <p>
        <label>Stock Quantity</label><br>
        <input type="number" name="stock_quantity" min="0" value="{{ old('stock_quantity') }}">
    </p>

    <p>
        <label>Product Image (JPG, PNG, or WEBP; max 2 MB)</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/*">
    </p>

    <button type="submit">Save Product</button>
    <a href="{{ route('products.index') }}">Cancel</a>
</form>