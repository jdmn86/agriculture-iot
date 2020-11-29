<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- <meta name="user" content="Auth::user()"> -->

     <title>{{ config('app.name', 'SADALab') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo3.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
    <body>
    
             <main id="app"></main>
              
            <!-- Scripts -->
            <script>
                window.baseUri = "{{ trim(config('app.url'), '/') }}";
            </script>



<!-- <script>
  @auth
    window.Permissions = {!! json_encode(Auth::user()->allPermissions, true) !!};
    window.Roles = {!! json_encode(Auth::user()->roles, true) !!};
  @else
    window.Permissions = [];
    window.Roles = [];
  @endauth
</script> -->
            <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
