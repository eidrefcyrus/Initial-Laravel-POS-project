<a href="{{ route('home') }}">Home</a> |
<a href="{{ route('about') }}">About</a>

@auth
    | <a href="{{ route('products.index') }}">Products</a>
    | <a href="{{ route('customers.index') }}">Customers</a>
    | <a href="{{ route('users.index') }}">Staff</a>
    | <a href="{{ route('sales.index') }}">Sales History</a>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Log Out</button>
    </form>
@else
    | <a href="{{ route('login') }}">Log In</a>
@endauth

<hr>

<h1>Laravel POS Management System</h1>

<p>
    Manage products, customers, staff accounts, and sales in one secure application.
</p>

@guest
    <p>Please log in to access POS management and sales features.</p>
@endguest