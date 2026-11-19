<a href="/users">← Back to Users</a>

<h1>Add User</h1>

<form action="/users" method="POST">
    @csrf

    <p>
        <label>Username</label><br>
        <input type="text" name="username" value="{{ old('username') }}">
        @error('username')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}">
        @error('full_name')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Save User</button>
</form>