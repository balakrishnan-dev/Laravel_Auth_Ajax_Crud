@if(session('login'))
    <script>
        alert("{{ session('login') }}");
    </script>
@endif

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

@if(session('register'))
    <script>
        alert("{{ session('register') }}");
    </script>
@endif

@if(session('logout'))
    <script>
        alert("{{ session('logout') }}");
    </script>
@endif

<h1>Login Form</h1>

<form action="{{url('/login')}}" method="POST">
    @csrf

    Email : <input type="email" name="email"> <br>
    <br>
    Password : <input type="password" name="password"> <br>
    <br>
    <button type="submit">Login</button>
    <br>
    <br>
    <button> <a href="{{url('/register')}}"> Go to Register</a></button>
</form>