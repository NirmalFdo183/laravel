<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Item Edit</title>
</head>
<body>
    <h3>Edit Food Item</h3>
    <form action="{{route('editFoodItem',$food->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Item Name</label>
        <input type="text" name="name" id="name" value="{{$food->name}}"><br>

        <label for="category">Category</label>
        <input type="text" name="category" id="category" value="{{$food->category}}"><br>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" step="0.01" value="{{$food->price}}"><br>

        <button type="submit">Edit Item</button>
    </form>
</body>
</html>