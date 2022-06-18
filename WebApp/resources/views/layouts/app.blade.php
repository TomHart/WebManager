<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Archlord</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    @yield('styles')
    @livewireStyles
</head>

<body class="antialiased min-h-screen">
    <livewire:frontend.component.nav-bar />
    <livewire:frontend.component.carousel loadFrom="carousel" />

    @yield('content')

    @yield('scripts')
    @livewireScripts
</body>

</html>
