<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User|Dashboard</title>
</head>
<body>
    <h1>Hello @auth {{ auth()->user()->name }} @endauth</h1>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div>
        <h3>My Tasks</h3>
        <div>
            <h2>Create a task</h2>

            <form action="" method="post">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"><br>

                <label for="description">Description</label>
                <input type="text" name="description" id="description"><br>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="In Pending">In Pending</option>
                    <option value="Progress">Progress</option>
                    <option value="Completed">Completed</option>
                </select> <br>

                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date"><br>

                <button type="submit">Create</button>
            </form>
        </div>
        <div>
            @if($tasks->isEmpty())
                <p>No tasks added yet</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>due_date</th>
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