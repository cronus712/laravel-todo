@extends('user.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Edit user</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{route('user.index')}}"> Back</a>
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
  
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-zgroup">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" style="height:80px" name="email" placeholder="email" value="{{ $user->email }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> New password:</strong>
                    <input type="password" class="form-control" style="height:80px" name="password" placeholder="new password" value="{{ $user->password }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Confirm password:</strong>
                    <input style="height:80px" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password"value="{{ $user->password }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select class="form-control" style="height:80px" name="role" placeholder="role" > 
                        {{-- <option value="{{$user->role}}">user</option>
                        <option value="{{$user->role}}">admin</option>  --}}
                        
                        <option  @if (old('{{$user->role}}') == 'user')  @endif>user</option>
                        <option  @if (old('{{$user->role}}') == 'admin')  @endif>admin</option>

                   
                      
                    </select>

                    {{-- <textarea class="form-control" style="height:150px" name="role" placeholder="role">{{ $user->role }}</textarea> --}}
                </div>
            </div>


            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection