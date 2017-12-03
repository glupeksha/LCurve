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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

</head>
<body class="full">

    <div id="app" class="full">

        <!-- Navigation Bar -->
        @include('layouts.nav')

        <!-- Errors -->
        @if(Session::has('flash_message'))
            <div class="container">
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include ('layouts.errors') {{-- Including error file --}}
            </div>
        </div>

        @yield('content')

        @auth
            @include('layouts.dashboard')
        @endauth


    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.calendario.js') }}"></script>
    @stack('scripts')

</body>
</html>
