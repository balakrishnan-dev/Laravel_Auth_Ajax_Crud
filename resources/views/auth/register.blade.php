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



<h1>Registration Form</h1>

<form action="{{url('/register')}}" method="POST">
    @csrf
    Name : <input type="text" name="name"><br>
    Phone : <input type="text" name="phone"><br>
    Email : <input type="email" name="email"><br>
    Password : <input type="text" name="password"><br>
    Confirm Password : <input type="text" name="password_confirmation"><br>
    <br>
    <button type="submit">Register</button>
</form>