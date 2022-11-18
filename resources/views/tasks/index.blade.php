 <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('tasks.layout')
 
@section('content')
<div class="row mt-5">
    @foreach ($tasks as $task)
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-header" style="background-color: rgb(57, 211, 80)">Tasks</div>
            <div class="card-body">
            <h5 class="card-title"><strong>{{$task->name}}</strong></h5>
            <h5 class="card-text">{{$task->user->name}}</h5>
            <h5 class="card-text">{{$task->project->name}}</h5>
            <br>
             <p class="card-text ">{{$task->detail}}</p>
         </div>
        </div>
    </div>
    @endforeach

</div>
    <div class="row mw-">

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('tasks.index') }}" method="GET" role="search" style="width: 20%;">
            <div class="input-group">
                <input class="form-control" type="text" name="term" placeholder="Search for..." aria-label="Search tasks" aria-describedby="btnNavbarSearch" id="term"/>
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>

                <a href="{{ route('tasks.index') }}" >
                    <span class="mt-3" style="margin-left: 10px;">
                        <button class="btn btn-light " type="button" title="Refresh page" style="font-size: 20px">
                            <span class="fa fa-refresh " ></span>
                        </button>
                    </span>
                    
                </a>
            </div>
            
        </form>

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
  
    {{$tasks->links("pagination::bootstrap-4")}}
      
@endsection