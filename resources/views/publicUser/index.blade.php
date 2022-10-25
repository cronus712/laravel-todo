<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('tasks.layout')
 
@section('content')
    <div class="row mw-">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 >Task Manager</h2>
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
            <th>Action</th>
        </tr>
        
        @foreach ($user->tasks as $tasks)
        {{-- @if ($task->user->name  ?? null)
         @if ($task->project->name ?? null) --}}
             
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tasks->name }}</td>
            <td>{{ $tasks->detail }}</td>
            <td>{{$tasks->user->name }}</td>
            <td>{{$tasks->project->name}}</td>
            <td>
                    <a class="btn btn-info" href="{{url('publicuser/show',$tasks->id)}}">Show</a>
    
            </td>
        </tr>
        {{-- @endif   
        @endif --}}
        @endforeach
    </table>
  
    {{-- {!! $tasks->links() !!} --}}
      
@endsection