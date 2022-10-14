

    {{-- @foreach ($users as $user)

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">Name: {{$user->name}}</li>
        <li class="list-group-item">E-mail: {{$user->email}}</li>
        <li class="list-group-item">Role: {{$user->role}}</li>
      </ul>

    @endforeach --}}


    @extends('welcome')
   
@section('user')
<html>
<head>
    <title>List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>

@endsection

