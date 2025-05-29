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
  

   
</head>
<body>
        <div id="app"><br><br><br>

    
            <main class="py-4">
                @yield('content')
            </main>
    
     
        </div>
</body>
</html>