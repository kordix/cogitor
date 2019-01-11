<!DOCTYPE html>
<?php $currentlanguage = App\Setting::find(1)->language ?>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Memrise Appka</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .ikonaspain{
            background:url("{{asset('images/spain.png')}}");
            background-size:40px 30px;
            width:40px;
            height:30px;
            margin:10px;
        }

        .ikonagerman{
            background:url("{{asset('images/germany.png')}}");
            background-size:40px 30px;
            width:40px;
            height:30px;
            margin:10px;
        }


    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>



                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('listenstart') }}">
                        CogitorAppka
                    </a>
                </div>

                <div class="navbar" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-brand" href="{{ url('/') }}">Zacznij</a></li>
                        <li><a class="navbar-brand" href="{{ url('/list') }}">Lista</a></li>
                        <li><a class="navbar-brand" href="{{ url('/listzdania') }}">Zdania</a></li>
                        <li><a class="navbar-brand" href="{{ url('/create') }}">Dodaj</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li style="float:left">
                            {{-- <img src="{{asset('images/germany.png')}}" class="ikona" alt=""> --}}
                            <form action="{{route('setlanguage')}}" method="POST">{{csrf_field()}}{{method_field('patch')}}
                                <input type="hidden" name="jezyk" value="DE"><button class="ikona ikonagerman @if($currentlanguage=="DE")ikona-active @endif" id="DE" type="submit" ></button></form>
                        </li>
                        <li style="float:left">
                            <form action="{{route('setlanguage')}}" method="POST">{{csrf_field()}}{{method_field('patch')}}
                                <input type="hidden" name="jezyk" value="SP"><button class="ikona ikonaspain @if($currentlanguage=="SP")ikona-active @endif" id="SP" type="submit" ></button></form>
                        </li>
                        <li><a>
                            <form action="{{route('setcounter')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <select name="operator" id=""><option value="<"><</option><option value=">">></option></select>
                            <input class="" style="width:50px" type="number" name="counterinput" placeholder="">
                        <button type="submit">zmień counter</button>
                        </form>
                        </a></li>
                        <!-- Authentication Links -->

                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>test</li>
                                </ul>
                            </li>
                        @endguest

                    </ul>

                </div>
            </div>
        </nav>
        <div class="container">
        @if($flash=session('message'))
            <div class="col-md-5 alert alert-success">{{$flash}}</div>
        @endif
        </div>
        @yield('content')
    </div>
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script> --}}
    <!-- Scripts -->
    @yield('scripts')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}


    {{-- @guest @else
    <script>
    let ikony = document.getElementsByClassName('ikona');
    for(var i=0;ikony.length;i++){
        if(ikony[i].id == "{{$currentlanguage}}"){
            ikony[i].classList.add('ikona-active')
        }
    } --}}

    </script>
{{-- @endguest --}}
</body>
</html>
