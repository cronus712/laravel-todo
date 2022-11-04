
    <script src="{{ asset('js/app.js') }}" defer></script>

    
     <body>
        <nav class="navbar navbar-expand-md shadow p-3 mb-2 bg-white rounded">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h4>LOGO</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>   

                    <div class=" navbar-collapse collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mse-auto">
                            <li class="nav-item">
                            <a href="{{ url('admin/tasks') }}" class="nav-link"> All Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('publicuser/index') }}" class="nav-link"> My Tasks</a>
                        </li>
                       

                        <li class="nav-item"> 
                            <a href="{{ url('admin/user') }}" class="nav-link">Users </a>
                        </li>

                        <li class="nav-item"> 
                            <a href="{{ url('admin/project') }}" class="nav-link">Projects </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             <li class="nav-item dropdown">
                            @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 50px;height: 50px; ">
                             @else
                             <img class="image rounded-circle" src="{{asset('/storage/images/user.png'.Auth::user())}}" alt="profile_image" style="width: 50px;height: 50px;">

                            @endif
                        </li>
                            
                        @endguest
                        
                    </ul>
                    
                </div>
            </div>

            
        </nav>
</body>