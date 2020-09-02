<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional theme -->
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="https://cdn.bootcss.com/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<body>
    <div id="app">

    
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }} <span class="badge">Beta</span></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">账户控制台</a></li>
            <li><a href="{{ route('server.status') }}">服务器状态</a></li>
            <li><a href="#about">关于</a></li>
          </ul>
          <ul class="nav navbar-nav pull-right">
            @if (Auth::check())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->NAME}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('logout') }}">登出</a></li>
                </ul>
            </li>
            @else
            <li><a href="#about">登录</a></li>
            @endif
            <ul/>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
        <div class="container">
          @if (Auth::check())
          <div class="row">
            
            <div class="col-sm-3 col-md-2 sidebar">
              @include('layouts.sidenav')
            </div>
            
            <div class="col-sm-9">
            @include('layouts.errormsg')
            @yield('content')
            </div>

          </div>
          @else
            @include('layouts.errormsg')

            @yield('content')
          @endif
            
          <footer class="footer text-center">
            <hr/>
            <p>WEB DEV: &copy; {{ date("Y")}} 禾雀飞耀 | Project JavaSparrow All Rights Reserved</p>
          </footer>
        </div>
    </div>
   
</body>
</html>
