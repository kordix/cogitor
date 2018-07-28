<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fiszki słuchowe</title>
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
                    <a class="navbar-brand"  href="{{ url('/') }}">
                        <span style="text-shadow:0px 0px 1px #56A5EC;font-weight:500"> Fiszki Słuchowe</span>
                    </a>
                </div>

                <div class="navbar" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-brand" href="{{ route('listenstart') }}">Zacznij</a></li>
                        <li><a class="navbar-brand" href="{{ route('listencreate') }}">Dodaj</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    
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
            <div class="alert alert-success">{{$flash}}</div>
        @endif
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('scripts')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <script>
    let ikony = document.getElementsByClassName('ikona');
    for(var i=0;ikony.length;i++){
        if(ikony[i].id == "{{$currentlanguage}}"){
            ikony[i].classList.add('ikona-active')
        }
    }

    </script>
</body>
</html>
