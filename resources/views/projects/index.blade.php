<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('projects.layout')
 
@section('content')
    <div class="row mw-">

        <div>
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('project.index') }}" method="GET" role="search">
    
                        <div class="input-group">
                            <span class="input-group-btn mr-5 mt-1 ">
                                <button class="btn btn-info mb-5" type="submit" title="Search projects" style="font-size: 24px">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                            <a href="{{ route('project.index') }}" class=" mt-1">
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
  
    {!! $projects->links() !!}
      
@endsection