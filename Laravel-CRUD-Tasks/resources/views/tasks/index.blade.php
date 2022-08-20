<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks - CRUD </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel CRUD Tasks Example</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create Task</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Task Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        @if($task->status == 1)
                        <td scope="row">Avilable</td>
                    @elseif($task->status == 0)
                        <td scope="row">Not Avilable</td>
                    @endif
                        <td>
                            <form action="{{ route('tasks.destroy',$task->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                                <a class="btn btn-primary" href="{{ route('tasks.show',$task->id) }}">Show</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $tasks->links() !!}
    </div>
</body>
</html>