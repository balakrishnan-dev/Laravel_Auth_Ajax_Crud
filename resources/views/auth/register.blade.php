<form action="{{ url('/register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="phone" placeholder="Phone">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <button type="submit">Register</button>
</form>
