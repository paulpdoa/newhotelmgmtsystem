<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Management System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    {{-- Icons Fontawesome --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">

    {{-- head icon --}}
    <link rel="icon" type="image/png" href="img/favicon.ico"/>
</head>
<body>
    <nav class="navbar navbar-info bg-info">
        @guest
        <div class="login-logout">
            <div class="login-container">
                @if(Route::has('login'))
                <a href="{{ route('login') }}"><strong>Login</strong></a>
                @endif
            </div>
           <div class="logout-container">
                @if(Route::has('register'))
                <a href="{{ route('register') }}"><strong>Register</strong></a>
                @endif
           </div>  
        </div>
        <div class="username">
            <div class="user-container">
                @else
                <h5 class="user"><i class="fas fa-user"></i> {{ Auth::user()->name }} <i class="fas fa-caret-down"></i></h5>
            </div>
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="submit btn-dark">Logout</button>
                </form>
            </div>
        </div>
        @endguest
        <i style="color:white;" class="fas fa-bars menu"></i>
        <div class="nav-button">
            <ul>
                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="{{ route('sidebars.about') }}"><i class="fas fa-address-book"></i>About</a></li>
                <li><a href="{{ route('sidebars.contact') }}"><i class="fas fa-info-circle"></i>Contact</a></li>
            </ul>
        </div>
    </nav>
        <div class="py-4 main-container">
            <div class="sidebar">
                <h4><a class="active" href="{{ url('/') }}">
                    Hotel Management System
                </a></h4>
                    <h4>
                        <a href="/"><i class="fas fa-home"></i>Home</a>
                        <a href="{{ route('sidebars.about') }}"><i class="fas fa-address-book"></i>About</a>
                        <a href="{{ route('sidebars.contact') }}"><i class="fas fa-info-circle"></i>Contact</a>
                    </h4>
              </div>
            <div class="content-container">
                @yield('content')
                
            </div>
        </div>
<script>
    const menu = document.querySelector('.menu');
    const nav = document.querySelector('.nav-button');

    const user = document.querySelector('.user');

    menu.addEventListener('click',() => {
        if(nav.style.display === 'block'){
            nav.style.display = 'none';
        } else {
            nav.style.display = 'block  ';
        }
    })

    user.addEventListener('click',() => {
        const logout = document.querySelector('.logout');
        if(logout.style.display === 'block'){
            logout.style.display = 'none';
        } else {
            logout.style.display = 'block';
        }
    })

</script>
</body>
</html>
