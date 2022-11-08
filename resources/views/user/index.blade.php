<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

@extends('user.layout')
 
@section('content')
    <div class="row mw-">
        
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('user.index') }}" method="GET" role="search" style="width: 20%; ">
            <div class="input-group">
                <input class="form-control" type="text" name="term" placeholder="Search for..." aria-label="Search tasks" aria-describedby="btnNavbarSearch" id="term"/>
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit" title="Search"><i class="fas fa-search"></i></button>

                <a href="{{ route('user.index') }}" >
                    <span class="pull-left" style=" position: absolute; top: 1px; right: 225px;">
                        <button class="btn btn-light " type="button" title="Refresh page" style="font-size: 20px">
                            <span class="fa fa-refresh " ></span>
                        </button>
                    </span>
                    
                </a>
            </div>
            
        </form>
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 >User Manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('user.create')}}"> Create New user</a>
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
            <th>email</th>
            <th>role</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>

            <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('user.show',$user->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')

                    @if(Auth::user()->id === $user->id)
                            <a href='#' class="btn btn-danger" disabled title="can't delete ">Delete </a>
                        @else
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
      
@endsection