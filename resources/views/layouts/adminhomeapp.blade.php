<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ChurchAdmin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
                <a class="navbar-brand uk-margin-small-right nav-link" uk-toggle="target: #offcanvas-nav" href="{{ url('/') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: table"></span>
                    {{ config('app.name', 'ChurchAdmin') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative; padding-left: 50px;" v-pre>
                                    {{-- <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height:32px; position: absolute; top: 10px; left: 10px; border-radius: 45%"> --}}
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href={{ url('/profile') }}>Edit Profile</a>
                                    <a class="dropdown-item" href="#">Notifications</a>
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
            
        </nav>

        <div id="offcanvas-nav" uk-offcanvas="overlay: true">
            <div class="uk-offcanvas-bar">
        
                <ul class="uk-nav uk-nav-default">
                    {{-- <li class="uk-active"><a href="#">Active</a></li> --}}
                    {{-- <li class="uk-parent">
                        <a href="/home"><span class="uk-margin-small-right" uk-icon="icon: home"></span>Dashboard</a>
                        <ul class="uk-nav-sub">
                            <li><a href="/sermons/create">Create Bible Note</a></li>
                            <li><a href="/roles/create">Create Role</a></li>
                            <li><a href="/services/create">Create Service</a></li>
                            <li><a href="/conferences/create">Create Event</a></li>
                            <li><a href="/rotas/create">Create Duty Rota</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="uk-nav-header">Header</li> --}}
                    <li><a href="/home"><span class="uk-margin-small-right" uk-icon="icon: home"></span> Dashboard</a></li>
                    <br>
                    <li class="uk-nav-divider"></li>
                    <br>
                    <li><a href="/members"><span class="uk-margin-small-right" uk-icon="icon: users"></span> Church Directory</a></li>
                    <br>
                    {{-- <li><a href="/members"><span class="uk-margin-small-right" uk-icon="icon: users"></span> Church Directory</a></li>
                    <br> --}}
                    <li class="uk-nav-divider"></li>
                    <br>
                    <li><a href="/sermons"><span class="uk-margin-small-right" uk-icon="icon: bookmark"></span> Bible Notes</a></li>
                    
                    <li><a href="/services"><span class="uk-margin-small-right" uk-icon="icon: tag"></span> Church Services</a></li>
                    <li><a href="/conferences"><span class="uk-margin-small-right" uk-icon="icon: calendar"></span> Events &amp; Conferences</a></li>
                    <li><a href="/roles"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Roles</a></li>
                    <li><a href="/rotas"><span class="uk-margin-small-right" uk-icon="icon: refresh"></span> Duty Rotas</a></li>
                    <br>
                    <li class="uk-nav-divider"></li>
                    <br>
                    <li><a href="/insights"><span class="uk-margin-small-right" uk-icon="icon: image"></span> Charts &amp; Insights</a></li>
                    <br>
                    <li class="uk-nav-divider"></li>
                    <br>
                    <li><a href="/reports"><span class="uk-margin-small-right" uk-icon="icon: print"></span> Reports</a></li>
                    <br>
                    <li class="uk-nav-divider"></li>
                    <br>
                    <li><a href="/sysinfo"><span class="uk-margin-small-right" uk-icon="icon: settings"></span> System Info</a></li>
                </ul>
        
            </div>
        </div>

        <main class="py-4">
            {{-- <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" 
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sermons">Bible Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/conferences">Events &amp; Conferences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/roles">Church Roles</a>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div> --}}
            @include('inc.messages')
            @yield('content')
        </main>
        
        
        {{-- {!! $chart->script() !!} --}}
    </div>

    {{-- <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        let massPopChart = new Chart(myChart, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels:['Madina', 'Legon', 'Dansoman', 'Adenta', 'Weija', 'Tema'],
                datasets:[{
                    label: 'Population',
                    data: [
                        155155,
                        155587,
                        287456,
                        257412,
                        47586,
                        74521
                    ]
                }]
            },
            options: {};
        });
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</body>
</html>
