<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Task - CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Task <span style="color:chocolate"> {{$task->name}} </span></h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tasks.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('tasks.update',$task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Task Name:</strong>
                        <input type="text" name="name" value="{{ $task->name }}" class="form-control"
                            placeholder="Task name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Task Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Task Description"
                            value="{{ $task->description }}">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Task Status:</strong>
                        <select name="status"
                        @if($task->status == 1)
                            value="Avilable"
                        @elseif($task->status == 0)
                            value="Not Avilable"
                        @endif
                        
                        id="status" class="form-control input-lg">
                            <option value="0">Not Avilable</option>
                            <option value="1">Avilable</option>
                        </select>
                    </div>


                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>