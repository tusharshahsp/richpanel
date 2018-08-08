<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" href="/img/RichpanelLogo.png" type="img/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
            });
    </script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Crimson" rel="stylesheet" type="text/css">
 -->
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .app {
            display: table;
            width: 100%;
            height: 100%;
        }

        .header, .content, .footer {
            display: table-row;
        }

        .header, .footer {
            
            height:0;
            /*background: red;*/
        }

        .container-fluid {
            height: 100%;
            overflow: auto;
        }
        .footer {
            /*width: 100%
            background-color:red;
            bottom:auto;*/
            /*position:fixed;*/
            /*
            padding:auto;

            left: 0;
            bottom: 0;
            color: white;
            text-align: center;*/
             bottom:auto;
            padding:auto;
        }
        
    </style>
 
</head>
<body>
    <div id="app" class="app">
        <!-- header -->
        <div class="header" style="background-color:#87A2C0">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}" class="brand-logo"><img class="responsive-img" style="margin-top: 1px; height:50px" src="{!! asset('img/Richpanel-Logo-Blue.png') !!}"/>
                    </a>
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>                            
                            @auth 
                                <ul class="nav nav-tabs" style="background-color: #235486; font-style: bold">
                                    <li><a class="nav-link" href="{{ route('productsmen') }}" style="color: #8DB7DC">{{ __('Men') }}</a></li>
                                    <li><a class="nav-link" href="{{ route('productswomen') }} " style="color: #8DB7DC">{{ __('Women') }}</a></li>
                                    <li><a class="nav-link" href="{{ route('productskids') }}" style="color: #8DB7DC">{{ __('Kids') }}</a></li>
                                </ul>
                            @endauth



                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                </li>
                                <li class="nav-item dropdown">
                                    
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                     <!-- <span id="cart" class="badge"></span> -->
                                    

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
        </div>

        <!-- content -->
        <div class="content">
        <div class="container-fluid" >
        <meta name="csrf-token" content="{!! csrf_token() !!}">
            @auth
            <div class="row" style="margin-top:50px;">
                    <!-- <div class="col-md-3">
                        <div class="list-group">
                            {{ Html::linkRoute('login', 'Home', [], ['class'   => 'list-group-item', 'id'  => 'coorMentorHome']) }}
                        </div>
                    </div> -->
                    <div class="col-md-12" >

                        @yield('content')
                    </div>
            </div>
            @else
            <main class="py-4">
                @yield('content')

            </main>
            @endauth

            @yield('scripts')
        </div>
        </div>


        <!-- footer -->
        @yield('footer')

    </div>
</body>
</html>

