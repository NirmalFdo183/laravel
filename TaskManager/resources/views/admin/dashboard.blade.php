<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Dashboard</title>
</head>
<body>
    <h1>hello @auth {{auth()->user()->name}} @endauth </h1>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
</body>
</html>