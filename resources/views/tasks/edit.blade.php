@extends('tasks.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('tasks.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('tasks.update',$task->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $task->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $task->detail }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="cases">User :</label>
                <select name="user_id" class="form-control" value="{{ $task->user }}">
                    {{-- <option disabled selected value> -- select a user -- </option> --}}
                    @foreach ($user as $user)
                    <option value="{{ $user->id}}">{{ $user->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="cases">Project :</label>
                <select name="project_id" class="form-control" value="{{ $task->project }}">
                    {{-- <option disabled selected value> -- select a project -- </option> --}}
                    @foreach ($project as $project)
                    <option value="{{ $project->id}}">{{ $project->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection