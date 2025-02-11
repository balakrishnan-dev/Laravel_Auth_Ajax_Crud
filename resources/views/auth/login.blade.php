<form action="{{ url('/login') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
    <a href="{{ url('/register') }}">Go to Registration</a>
</form>
