<a href="/customers">← Back to Customers</a>

<h1>Add Customer</h1>

<form action="/customers" method="POST">
    @csrf

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}">
        @error('full_name')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}">
        @error('phone')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Save Customer</button>
</form>