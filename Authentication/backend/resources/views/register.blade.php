<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{route('register.form')}}" method="POST">
        @csrf
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" autocomplete="name"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" autocomplete="email"><br>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" autocomplete="new-password"><br>

        <label for="pwd_confirmation">Confirm Password:</label>
        <input type="password" name="pwd_confirmation" id="pwd_confirmation" autocomplete="new-password"><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>