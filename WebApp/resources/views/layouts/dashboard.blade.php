<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind is included -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">  
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  @yield('styles')
<body>


<div id="app">
    @include('components.top-bar')
    @include('components.side-bar')
    @yield('content')
</div>

   
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  @yield('scripts')
</div>
</body>
</html>