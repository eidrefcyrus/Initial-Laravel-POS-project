<a href="/">Home</a> |
<a href="/about">About</a> |
<a href="/customers">Customers</a> |
<a href="/users">Users</a>

<hr>

<h1>Customer Accounts</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->full_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
        </tr>
    @endforeach
</table>