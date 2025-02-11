<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="{{url('/login')}}" method="POST">
        @csrf
        <label for="email">Email</label> <br>
        <input type="email" name="email" placeholder="Enter Email" required> <br>
        <label for="password">Password</label> <br>
        <input type="text" name="password" placeholder="Enter Password" required> <br>
        <br>
        <button type="submit">Login</button>
        <h3>Go To Registration Form <a href="{{url('/register')}}">Register</a></h3>
    </form>
</body>
</html>