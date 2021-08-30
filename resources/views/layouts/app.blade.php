<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Atendimento-SAC') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/8786c39b09.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href='{{asset('css/bootstrap.css')}}' rel='stylesheet' />
    <link href='{{asset('packages/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('packages/daygrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('packages/timegrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('packages/list/main.css')}}' rel='stylesheet' />
    <link href='{{asset('datatables/datatables/datatables.min.css')}}' rel='stylesheet' />
    <link href='{{asset('datatables/main.css')}}' rel='stylesheet' />
    <link href='{{asset('datatables/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />
    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
     <!-- jQuery -->
    <script src="{{asset('jquery/jquery-3.5.1.min.js')}}"></script>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistema Atendimento - SAC
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
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
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
  <script src="{{asset('js/highcharts.js')}}"></script>
  <!--DataTable Popper.js, Bootstrap JS -->
 <script src="{{asset('datatables/popper/popper.min.js')}}"></script>
 <script src="{{asset('datatables/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- JavaScripts -->
  <script src="{{asset('js/Chart.min.js')}}"></script>
  <script src="{{asset('js/hBarChart.js')}}"></script>
  <script src="{{asset('js/moment.min.js')}}"></script>
  <!-- datatables JS -->
  <script type="text/javascript" src="{{asset('datatables/datatables/datatables.min.js')}}"></script>
  <!-- para usar botones en datatables JS -->
  <script src="{{asset('datatables/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('datatables/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
  <script src="{{asset('datatables/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
  <script src="{{asset('datatables/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
  <script src="{{asset('datatables/datatables/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
  <!-- código JS propìo-->
  <script src="{{asset('datatables/main.js')}}"></script>
  <!-- código JS calendario-->
<script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/core/locales-all.js')}}'></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

<script>let objCalendar;</script>
<script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>
<script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>
</body>

</html>
