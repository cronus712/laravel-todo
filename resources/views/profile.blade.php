@extends('sidenav')

@section('profile')
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> --}}
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

 

<div class="container rounded bg-white mt-5 mb-5">
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

<form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" >
    @method('PUT')
    @csrf

    <div class="row"> 

        <div class="col-md-5 border-right">
                
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if(Auth::user()->image)
                <img class="rounded-circle mt-5" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 250px;height: 250px; ">
                <div class="image-upload">
                    <label for="file-input">
                      <img src="/storage/images/upload.png" style="width: 70px; height:50px;" class="mt-2"/>
                    </label>
                  
                    <input id="file-input" type="file" name="image"/>
                  </div>
                @else
                <img class="image rounded-circle" src="{{asset('/storage/images/user.png')}}" alt="profile_image" style="width: 250px; height: 250px; ">
                <input type="file" name="image" >
                @endif
                   
                    
                
                
                <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                <span class="text-black-50">{{Auth::user()->email}}</span>
                <span> </span>
            </div>
        </div>
       

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}">
                    </div>
                    </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">E-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="E-mail" {{ Auth::user()->email ? 'readonly' : '' }} value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="col-md-12"><label class="labels">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" value="{{Auth::user()->password}}">
                    </div>
                    <div class="col-md-12"><label class="labels">Confirm password</label>
                    <input  name="password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password"value="{{ Auth::user()->password }}">
                    </div>
                    <div class="col-md-12"><label class="labels">Role</label>
                        <input name="role" type="text" class="form-control" placeholder="Role" {{ Auth::user()->role ? 'readonly' : '' }} value="{{Auth::user()->role}}" disabled>
                    </div>
                    
                </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</form>

</div>
@endsection
