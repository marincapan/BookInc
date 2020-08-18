<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/B.png"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookInc - Share Your Books</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/f838933a8e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/@coreui/coreui/dist/css/coreui.min.css">
    <script src="node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <style>
        .btn-primary, .btn-primary:hover {
            color: #fff;
            background-color: #22bfa0;
            border-color: #22bfa0;
        }
        a, a:hover, , .btn-link, .btn-link:hover{
            color: #22bfa0 !important;
        }
        .col-4{
        max-width: 100% !important;
        flex: 0 0 100% !important;
        }
     </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-home"></i>&nbsp;{{ __('Home')  }}
                </a>
                @auth
                <a class="navbar-brand" href="{{ url('home') }}">
                <i class="fas fa-columns"></i>&nbsp;{{ __('Dashboard')  }}
                </a>
                <a class="navbar-brand" href="{{ url('books') }}">
                <i class="fas fa-layer-group"></i>&nbsp;{{ __('Stock')  }}
                </a>
                @endauth
        
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
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>&nbsp;{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                <a class="dropdown-item" href="{{ route('profile') }}"
                                       >
                                       <i class="fas fa-user-circle"></i>&nbsp;{{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mybooks') }}"
                                       >
                                       <i class="fas fa-book"></i>&nbsp;{{ __('My Books') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mybookings') }}"
                                       >
                                       <i class="fas fa-book-reader"></i>&nbsp;{{ __('My Bookings') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}
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
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            @yield('content')
        </main>
    </div>
    
</body>
<footer>
<div class="container" >
<hr/>
        <div class="row">
          <div  class="col-4 d-flex justify-content-center text-center">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved 
            | <a href="mailto:support@bookinc.com">support@bookinc.com</a></p>
          </div>

        </div>
      </div>
    </footer>
</html>
