<a href="{{ route('home') }}">Home</a> |
<a href="{{ route('products.index') }}">Products</a> |
<a href="{{ route('customers.index') }}">Customers</a> |
<a href="{{ route('users.index') }}">Staff</a> |
<a href="{{ route('sales.index') }}">Sales History</a>

@if (auth()->check())
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Log Out</button>
    </form>
@endif

<hr>

<h1>Staff Accounts</h1>

<p><a href="{{ route('users.create') }}">+ Add Staff User</a></p>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Avatar</th>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="60" height="60" style="object-fit: cover;">
                @else
                    <img src="{{ asset('images/avatar-placeholder.svg') }}" alt="No avatar" width="60" height="60">
                @endif
            </td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Edit</a>

                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this staff user?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>