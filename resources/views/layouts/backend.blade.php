<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
        <!-- Custom fonts for this template-->
    <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend')}}/css/sb-admin-2.min.css" rel="stylesheet">
  
</head>
            <body>
            <div id="app">
           @include('backend.layouts.header')
        <main class="py-4">
            @yield('content')
        </main>
        @include('backend.layouts.footer')
    </div>
</body>

   <!-- Scripts -->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{asset('backend')}}/js/sb-admin-2.min.js"></script>
    <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('backend')}}/js/demo/chart-pie-demo.js"></script>

@yield('js')

</html>
