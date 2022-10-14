@extends('user.layout')
 
@section('content')
    <div class="row mw-">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 >User Manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('user.create')}}"> Create New user</a>
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
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
      
@endsection