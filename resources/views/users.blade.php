<a href="/">Home</a> |
<a href="/about">About</a> |
<a href="/customers">Customers</a> |
<a href="/users">Users</a>

<hr>

<h1>User Accounts</h1>

<p><a href="/users/create">+ Add User</a></p>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Avatar</th>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Action</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="60" height="60">
                @else
                    <img src="{{ asset('images/avatar-placeholder.svg') }}" alt="No avatar" width="60" height="60">
                @endif
            </td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->full_name }}</td>
            <td><a href="/users/{{ $user->id }}/edit">Edit</a></td>
        </tr>
    @endforeach
</table>