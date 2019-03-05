<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        <div class="container">
            <div class="row">
              @if(Auth::check())
              <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="list-group-item"><a href="{{route('categories')}}">Categories</a></li>
                        <li class="list-group-item"><a href="{{route('tags')}}">Tags</a></li>
                        @if(Auth::user()->admin)
                        <li class="list-group-item"><a href="{{route('users')}}">Users</a></li>
                        <li class="list-group-item"><a href="{{route('user.create')}}">New User</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{route('user.profile')}}">My profile</a></li>
                        <li class="list-group-item"><a href="{{route('tag.create')}}">Create new Tag</a></li>
                        <li class="list-group-item"><a href="{{route('posts')}}">All Posts</a></li>
                        <li class="list-group-item"><a href="{{route('posts.trashed')}}">Trashed Posts</a></li>
                        <li class="list-group-item"><a href="{{route('category.create')}}">Create new Category</a></li>
                        <li class="list-group-item"><a href="{{route('post.create')}}">Create New Post</a></li>
                        @if(Auth::user()->admin)
                        <li class="list-group-item"><a href="{{route('settings')}}">Settings</a></li>
                        @endif
                    </ul>
                </div>
              @endif
            <div class="col-lg-8">

            @yield('content')
            </div>
                
            </div>
        </div>
           
        </main>
    </div>
    

    <!-- Bootstrap js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
   
    $(document).ready(function() {

    // show when page load
    @if(session('success'))
       toastr.success('{{session('success')}}');
    @endif

    @if(session('warning'))
       toastr.info('{{session('warning')}}');
    @endif

    $('#linkButton').click(function() {
       // show when the button is clicked
       toastr.success('Click Button');

    });

});
    
    </script>
    @yield('scripts')
</body>
</html>
