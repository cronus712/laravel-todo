<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('projects.layout')
 
@section('content')
    <div class="row mt-5">
        @foreach ($projects as $project)
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header" style="background-color: rgb(57, 70, 211)">Projects</div>
                <div class="card-body">
                <h5 class="card-title"><strong>{{$project->name}}</strong></h5>
                 <p class="card-text">{{$project->detail}}</p>
             </div>
            </div>
        </div>
        @endforeach

    </div>


    <div class="row mw-">

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('project.index') }}" method="GET" role="search" style="width: 20%;">
            <div class="input-group">
                <input class="form-control" type="text" name="term" placeholder="Search for..." aria-label="Search tasks" aria-describedby="btnNavbarSearch" id="term"/>
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>

                <a href="{{ route('project.index') }}" >
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
                <h2 >Project Manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('project.create')}}"> Create New Project</a>
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
        @foreach ($projects as $project)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->detail }}</td>
        
            <td>
                <form action="{{ route('project.destroy',$project->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('project.show',$project->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
  
    {{-- {!! $projects->links() !!} --}}
    {{$projects->links("pagination::bootstrap-4")}}
    
      
@endsection