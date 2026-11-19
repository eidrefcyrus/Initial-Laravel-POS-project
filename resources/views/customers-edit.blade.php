<a href="/customers">← Back to Customers</a>

<h1>Edit Customer</h1>

<form action="/customers/{{ $customer->id }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name" value="{{ old('full_name', $customer->full_name) }}">
        @error('full_name')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $customer->email) }}">
        @error('email')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}">
        @error('phone')
            <br><span style="color: red;">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Update Customer</button>
</form>