<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Store</title>
</head>
<body>
    <form action="{{route('register')}}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="" selected disabled></option>
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select><br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address"><br>

        <label for="mobile">Mobile No</label>
        <input type="text" name="mobile" id="mobile" max="10"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" min="6"><br>

        <button type="submit">Sign up</button>
    </form>
</body>
</html>