<a href="/users">← Back to Staff</a>

<h1>Add Staff User</h1>

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

    <p>
        <label>Email Address</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password">
        @error('password')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </p>

    <button type="submit">Save Staff User</button>
</form>