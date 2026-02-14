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

    <div>
        <div>
            <span>Total number of users</span>
            <span>{{ $totalUsers }}</span>
        </div>

        <div>
            <span>Total number of tasks</span>
            <span>{{ $totalTasks }}</span>
        </div>

        <div>
            <h3>Tasks</h3>

            @if(session('success'))
                <p>{{ session('success') }} </p>
            @endif

            @if ($tasks->isEmpty())
                <p>No tasks added yet</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>due_date</th>
                            <th>user id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description}}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->user_id }}</td>
                                <td>
                                    <form action="{{ route('admin.deleteTask',$task->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>