 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('tasks.layout')
 
@section('content')
    <div class="row mw-">
        <div>
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('tasks.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search tasks" style="font-size: 24px">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search tasks" id="term">
                            <a href="{{ route('tasks.index') }}" class=" mt-1">
                                <span class="pull-right " style=" position: absolute; top: 1px; left: 260px;">
                                    <button class="btn btn-light pull-right " type="button" title="Refresh page" style="font-size: 20px">
                                        <span class="fa fa-refresh "></span>
                                    </button>
                                </span>
                                
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
            <th>User</th>
            <th>Project</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($tasks as $task)
        {{-- @if ($task->user->name  ?? null)
         @if ($task->project->name ?? null) --}}
             
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->detail }}</td>
            <td>{{$task->user->name }}</td>
            <td>{{$task->project->name}}</td>
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
        {{-- @endif   
        @endif --}}
        @endforeach
    </table>
  
    {!! $tasks->links() !!}
      
@endsection