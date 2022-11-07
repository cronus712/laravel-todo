

    {{-- @foreach ($users as $user)

    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">Name: {{$user->name}}</li>
        <li class="list-group-item">E-mail: {{$user->email}}</li>
        <li class="list-group-item">Role: {{$user->role}}</li>
      </ul>

    @endforeach --}}


    @extends('sidenav')
   
@section('user')
<html>
<head>
    <title>List</title>
</head>
<body>

<div class="container">
    @yield('content')
</div>

<script src="/js/scripts.js"></script>
</body>
</html>

@endsection

