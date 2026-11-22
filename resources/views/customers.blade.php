<a href="{{ route('home') }}">Home</a> |
<a href="{{ route('products.index') }}">Products</a> |
<a href="{{ route('customers.index') }}">Customers</a> |
<a href="{{ route('users.index') }}">Staff</a> |
<a href="{{ route('sales.index') }}">Sales History</a>

<hr>

<h1>Customer Accounts</h1>

<p><a href="{{ route('customers.create') }}">+ Add Customer</a></p>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->full_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone ?: '—' }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer) }}">Edit</a>

                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this customer?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>