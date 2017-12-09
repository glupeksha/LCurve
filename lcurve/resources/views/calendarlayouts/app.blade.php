<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="full">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', "L'Curve") }}</title>

    <!-- Styles -->
    <script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"
    >
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')


    <style type="text/css">
       
            .fc-basic-view .fc-body .fc-row { min-height: 10em; }
            .fc-event-container{
                visibility:visible; 
            }
     
    </style>

</head>
<body class="full">

    <div id="app" class="full">

        <!-- Navigation Bar -->
        @include('calendarlayouts.nav')

        <!-- Errors -->
        @if(Session::has('flash_message'))
            <div class="container">
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include ('calendarlayouts.errors') {{-- Including error file --}}
            </div>
        </div>

        @yield('content')

        @auth
            @include('calendarlayouts.dashboard')
        @endauth


    </div>



    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js">
  </script>
  {!! $fullcalendar->script() !!}
    @stack('scripts')

</body>
</html>