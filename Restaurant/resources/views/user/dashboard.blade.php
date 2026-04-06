<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <style>
        table{
            border:1px solid black;
            border-collapse: collapse;
        }
        th,td{
            border:1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>User Dashboard</h1>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <form action="{{route('editUser')}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{old('name',$user->name)}}"><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{old('email',$user->email)}}"><br>
        <button type="submit">Edit Profile</button>
    </form>

    <h3>Select Food items</h3>
    @if ($foods->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Food Item</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                            
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