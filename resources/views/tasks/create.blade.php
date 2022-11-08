@extends('tasks.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Add New task</h2>
        </div>
        <div class="float-end">
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
   
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail" value="{{ old('detail') }}"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
              <select name="user_id" class="form-control" >
                  <option disabled selected value> -- select a user -- </option>
                  @foreach ($users as $user)
                  <option value="{{ $user->id}}">{{ $user->name}}</option>
                  @endforeach
              </select>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project:</strong>
                  <select name="project_id" class="form-control">
                      <option disabled selected value> -- select a project -- </option>
                      @foreach ($projects as $project)
                      <option value="{{ $project->id}}">{{ $project->name}}</option>
                      @endforeach
                  </select>
            </div>
            </div>
        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection