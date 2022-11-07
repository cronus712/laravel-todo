@extends('sidenav')
   
@section('mytasks')
<html>
<head>
    <title>My tasks</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
</head>
<body>

<div class="container">
    @yield('content')
</div>

<script src="/js/scripts.js"></script>
</body>
</html>

@endsection

