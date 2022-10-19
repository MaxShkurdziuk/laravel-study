<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-light">
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Grand Movies list</span>
    </div>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('main') }}" class="nav-link active" aria-current="page">Home</a></li>
        @if (!auth()->check())
            <li class="nav-item"><a href="{{ route('sign-up.form') }}" class="nav-link">Sign Up</a></li>
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endif
        @if (auth()->check())
            <li class="nav-item"><a href="{{ route('login_history') }}" class="nav-link">Login History</a></li>
            <li class="nav-item"><a href="{{ route('movies.list') }}" class="nav-link">Movies</a></li>
            @can('create', \App\Models\Film::class)
            <li class="nav-item"><a href="{{ route('movies.add.film') }}" class="nav-link">Add Film</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('genres.list') }}" class="nav-link">Film Genres</a></li>
            @can('create', \App\Models\Genre::class)
            <li class="nav-item"><a href="{{ route('genres.add.genre') }}" class="nav-link">Add Film Genre</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('actors.list') }}" class="nav-link">Actors</a></li>
            @can('create', \App\Models\Actor::class)
            <li class="nav-item"><a href="{{ route('actors.add.actor') }}" class="nav-link">Add Actor</a></li>
            @endcan
        @endif
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact Us</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
    </ul>
    @if (auth()->check())
        <form action="{{ route('logout') }}" method="post" class="form-inline">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    @endif
</header>
<div class="container">
    @include('flash-messages')
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>


