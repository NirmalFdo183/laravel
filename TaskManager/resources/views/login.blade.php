<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>Login Form</h1>
        <div>
            <form action="{{ route('login') }}" method="post">
                @csrf

                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="email"><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password"><br>

                <button type="submit">Login</button>
            </form>

            <div>
                Don't you have an account <a href="{{ route('register.form') }}">Sign in here</a>
            </div>
        </div>
    </div>
</body>
</html>