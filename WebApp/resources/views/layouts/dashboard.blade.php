<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <title>@yield('title') @hasSection('title')
            -
        @endif Archlord Admin</title>
    @yield('styles')
    @livewireStyles
</head>
<body class="dashboard">

<div id="app">
    <livewire:top-bar/>
    <livewire:side-bar/>
    @yield('content')
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
@livewireScripts
</body>
</html>
