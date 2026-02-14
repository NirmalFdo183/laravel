<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>

    <form action="{{ route('login') }}" method="post">
        @csrf

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br>

        <label>Password :</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

</body>
</html>