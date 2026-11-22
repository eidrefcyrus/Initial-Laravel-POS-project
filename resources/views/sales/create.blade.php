<h1>Record Sale</h1>

<p><a href="{{ route('sales.index') }}">← Back to Sales History</a></p>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('sales.store') }}" method="POST">
    @csrf

    <p>
        <label>Product</label><br>
        <select name="product_id" id="product_id">
            <option value="">Select a product</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}"
                        data-price="{{ $product->price }}"
                        @selected(old('product_id') == $product->id)>
                    {{ $product->name }} — ₱{{ number_format($product->price, 2) }}
                    (Stock: {{ $product->stock_quantity }})
                </option>
            @endforeach
        </select>
    </p>

    <p>
        <label>Customer (optional)</label><br>
        <select name="customer_id">
            <option value="">Walk-in Customer</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    @selected(old('customer_id') == $customer->id)>
                    {{ $customer->full_name }}
                </option>
            @endforeach
        </select>
    </p>

    <p>
        <label>Quantity</label><br>
        <input type="number" name="quantity" id="quantity" min="1"
               value="{{ old('quantity', 1) }}">
    </p>

    <p><strong>Estimated Total: ₱<span id="estimated-total">0.00</span></strong></p>

    <button type="submit">Record Sale</button>
    <a href="{{ route('sales.index') }}">Cancel</a>
</form>

<script>
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const totalDisplay = document.getElementById('estimated-total');

    function calculateTotal() {
        const option = productSelect.options[productSelect.selectedIndex];
        const price = Number(option?.dataset.price || 0);
        const quantity = Number(quantityInput.value || 0);

        totalDisplay.textContent = (price * quantity).toFixed(2);
    }

    productSelect.addEventListener('change', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);
    calculateTotal();
</script>