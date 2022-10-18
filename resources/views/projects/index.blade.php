<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('projects.layout')
 
@section('content')
    <div class="row mw-">
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