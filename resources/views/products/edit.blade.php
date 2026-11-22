<h1>Edit Product</h1>

<p><a href="{{ route('products.index') }}">← Back to Products</a></p>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if ($product->image)
    <p>
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->name }}"
             width="120" height="120"
             style="object-fit: cover;">
    </p>
@endif

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>
        <label>Product Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </p>

    <p>
        <label>Price</label><br>
        <input type="number" name="price" step="0.01" min="0"
               value="{{ old('price', $product->price) }}">
    </p>

    <p>
        <label>Stock Quantity</label><br>
        <input type="number" name="stock_quantity" min="0"
               value="{{ old('stock_quantity', $product->stock_quantity) }}">
    </p>

    <p>
        <label>Replace Product Image (optional)</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/*">
    </p>

    <button type="submit">Update Product</button>
    <a href="{{ route('products.index') }}">Cancel</a>
</form>