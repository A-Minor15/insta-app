<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Fontawesome CDN Links --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="h5 mb-0">
                        {{ config('app.name') }}
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- [SOON] Search bar here. Show it only to the logged in users --}}
                    <ul class="navbar-nav mx-auto">
                        {{-- This search form is only available for logged-users --}}
                        @auth
                            {{-- This form will not show in admin dashboard --}}
                            @if (!request()->is('admin/*'))
                                <form action="{{ route('search') }}" style="width: 300px">
                                    <input type="search" name="search" class="form-control-sm" placeholder="search here...">
                                </form>
                            @endif
                        @endauth
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- Home --}}
                                <li class="nav-item" title="Home">
                                    <a href="{{ route('index') }}" class="nav-link"><i class="fa-solid fa-house text-dark icon-sm"></i></a>
                                </li>

                            {{-- Create Post --}}
                                <li class="nav-item" title="Create Post">
                                    <a href="{{ route('post.create') }}" class="nav-link"><i class="fa-solid fa-circle-plus text-dark icon-sm"></i></a>
                                </li>

                            {{-- Account --}}
                            <li class="nav-item dropdown">

                                <button class="btn shadow-none nav-link"  data-bs-toggle="dropdown" id="account-dropdown">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-circle-user text-dark icon-sm"></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" >
                                    @can ('admin')
                                        {{-- [SOON] Admin Controls --}}
                                        <a href="{{ route('admin.users') }}" class="dropdown-item">
                                            <i class="fa-solid fa-user-gear"></i> Admin
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endcan

                                    {{-- Profile --}}
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fa-solid fa-circle-user"></i> Profile
                                    </a>

                                    {{-- Logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                {{-- Admin Controls --}}
                <div class="row justify-content-center">
                    {{-- Example: 1. http://localhost/post/3/show    - No
                                  2. http://localhost/admin/users    - Yes
                                  3. http://localhost/admin          - No
                                  4. http://localhost/admin/5/update - Yes --}}
                    @if (request()->is('admin/*'))
                        <div class="col-3">
                            <div class="list-group">
                                <div class="list-group-item p-0">
                                    <a href="{{ route('admin.users') }}" class="text-decoration-none border-0 list-group-item {{ request()->is('admin/users') ? 'active':'' }}">
                                        <i class="fa-solid fa-users"></i> Users
                                    </a>
                                </div>
                                <div class="list-group-item p-0">
                                    <a href="{{ route('admin.posts') }}" class="text-decoration-none list-group-item border-0 {{ request()->is('admin/posts') ? 'active':'' }}">
                                        <i class="fa-solid fa-newspaper"></i> Post
                                    </a>
                                </div>
                                <div class="list-group-item p-0">
                                    <a href="{{ route('admin.categories') }}" class="text-decoration-none list-group-item border-0 {{ request()->is('admin/categories') ? 'active':'' }}">
                                        <i class="fa-solid fa-tags"></i> Categories
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
