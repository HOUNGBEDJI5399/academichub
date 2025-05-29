<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ACADEMIC HUB') }}</title>

     <link rel="icon" href="{{ asset('image/iconeacademic.ico') }}" type="image/x-icon"   style="background-color:blue;">
    <link rel="shortcut icon" href="{{ asset('image/iconeacademic.ico') }}" type="image/x-icon"   style="background-color:blue;">


    <!-- Fonts -->
   

    <!-- Scripts -->
</head>
<body>
        <div id="app">
            <!-- Inclure le Header -->
            @include('etudiantdashboard.header') <br><br>
    
            <main class="py-4">
                @yield('content')
            </main>
    
            <!-- Inclure le Footer -->
            @include('etudiantdashboard.footer')
        </div>
</body>
</html>
