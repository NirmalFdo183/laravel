<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div>
        <h1>Register Form</h1>
        <div>
            <form action="{{ route('register.user') }}" method="post">
                @csrf
                <label for="name">Name </label>
                <input type="text" name="name" id="name" autocomplete="name" required><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="email" required><br>

                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" autocomplete="new-password" required><br>

                <label for="pwd_confirmation">Confirm Password</label>
                <input type="password" name="pwd_confirmation" id="pwd_confirmation" required><br>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>