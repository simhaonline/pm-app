<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="home-page" content="{{\App\CH::getUrl('') }}">
    <meta name="sub-url" content="{{env('SUB_URL') }}">
    <meta name="asset-url" content="{{\App\CH::getAssetUrl('') }}">

    <meta name="project-id" content="{{  Request::segment(2) }}">
    <meta name="project-name" content="{{ Request::segment(3) }}">

    <meta name="topic-name" content="{{ Request::segment(5) }}">
    <meta name="topic-id" content="{{ Request::segment(6) }}">

    <meta name="message-id" content="{{ Request::segment(5) }}">

    <meta name="document-id" content="{{ Request::segment(5) }}">

    <meta name="todo-lists-id" content="{{ Request::segment(5) }}">
    <meta name="todo-id" content="{{ Request::segment(5) }}">


    <meta name="people-id" content="{{ Request::segment(2) }}">

    <meta name="auth-user-id" content="{{ Auth::id() }}">
    <title>@yield('title') - {{ config('', 'LeadCamp') }}</title>
    <!-- Styles -->
    <link href="{{ \App\CH::getAssetUrl('')}}{{mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ \App\CH::getAssetUrl('')}}{{mix('css/all.css') }}" rel="stylesheet">
    <!-- new file -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/logo-nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://bcx.basecamp-static.com/assets/desktop-16ab7d94fe6dcce7227827c8cf8ec87f.css" rel="stylesheet">


    <!-- End of new File -->
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('', 'LeadCamp') }}
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @auth
                        <li>
                            <a href="{{url('projects')}}">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('team')}}">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('people/'.auth()->id())}}">You</a>
                        </li>
                    @endauth&nbsp;
                </ul>
                @auth
                    <div class="col-sm-3 col-md-3">

                        <form method="GET" class="navbar-form" action="{{\App\CH::getUrl('search')}}" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth&nbsp;

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{\App\CH::getUrl('profile/edit/'.Auth::id())}}">
                                        Edit Profile
                                    </a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ \App\CH::getAssetUrl('')}}{{ mix('js/app.js') }}"></script>
</body>
</html>
