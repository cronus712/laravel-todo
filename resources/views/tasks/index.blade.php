 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('tasks.layout')
 
@section('content')
    <div class="row mw-">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 >Task Manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('tasks.create')}}"> Create New task</a>
            </div>

            <div class="pull-left">
                <a class="btn btn-secondary"  href="{{route('home')}}"><i class="fa fa-backward"></i> Back</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->detail }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tasks->links() !!}
      
@endsection