<a href="/users">← Back to Staff</a>

<h1>Edit Staff User</h1>

@if ($user->avatar)
    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100" height="100">
@else
    <img src="{{ asset('images/avatar-placeholder.svg') }}" alt="No avatar" width="100" height="100">
@endif

<form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>
        <label>Username</label><br>
        <input type="text" name="username" value="{{ old('username', $user->username) }}">
        @error('username')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}">
        @error('full_name')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Email Address</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>New Password <small>(leave blank to keep the current password)</small></label><br>
        <input type="password" name="password">
        @error('password')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Confirm New Password</label><br>
        <input type="password" name="password_confirmation">
    </p>

    <p>
        <label>Profile Picture</label><br>
        <input type="file" name="avatar" accept="image/png,image/jpeg,image/webp">
        <br><small>JPG, PNG, or WEBP only. Maximum size: 2 MB.</small>
        @error('avatar')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Update Staff User</button>
</form>