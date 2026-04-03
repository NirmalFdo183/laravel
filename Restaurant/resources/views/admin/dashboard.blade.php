<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td,th{
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h3>Users</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Add food item</h3>
    <form action="{{route('createFoodItem')}}" method="POST">
        @csrf
        <label for="name">Item Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" autocomplete="off"><br>

        <label for="category">Category</label>
        <input type="text" name="category" id="category" value="{{old('category')}}" autocomplete="off"><br>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" step="0.01" value="{{old('price')}}" autocomplete="off"><br>

        <button type="submit">Add Item</button>
    </form>

    <h3>Food Items</h3>
    @if ($foods->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>{{$food->name}}</td>
                        <td>{{$food->price}}</td>
                        <td>{{$food->category}}</td>
                        <td>
                            <form action="{{route('deleteFoodItem',$food->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{route('editFoodItemPage',$food)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>no foods added yet.</p>
    @endif
    
</body>
</html>