<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('publicUser.layout')
 
@section('content')
    <div class="row mw-">
        <div>
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('publicuser.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search tasks" style="font-size: 24px">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search tasks" id="term">
                            <a href="{{ route('publicuser.index') }}" class=" mt-1">
                                <span >
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