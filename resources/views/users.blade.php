<a href="/">Home</a> |
<a href="/about">About</a> |
<a href="/customers">Customers</a> |
<a href="/users">Users</a>

<hr>

<h1>User Accounts</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->full_name }}</td>
        </tr>
    @endforeach
</table>