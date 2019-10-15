<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sistem Informasi Inventarisasi Tanaman') }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>
  <div id="app">
    <div class="card col-lg-8 col-lg-offset-2">
      <div class="row">
        @include('includes.navbars.top')
        @include('includes.navbars.mobile')
        <div class="species-navbar">
          @include('includes.navbars.species')
          @include('includes.navbars.group')
        </div>
        <div class="content">
          @yield('content')  
          <div class="clear"></div>  
        </div>
        <div class="empty-space"></div>
        @include('includes.footer')
      </div>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>

  @yield('script') 

</body>
</html>