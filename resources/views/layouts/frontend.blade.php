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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arya&family=Swanky+and+Moo+Moo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.css" integrity="sha512-g0BdMh4zEp4DuzHdoenUitpFx195QZfSFq5sd04kXZLwz5F9pUlGqwk+1jlvBBFGOnTCt0b5FsmQyl+5v2fxWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
</head>
<body>
            <div id="app">
           @include('frontend.layouts.header')
      
            @yield('content')
       
        @include('frontend.layouts.footer')
 

       <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
   <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script src="{{asset('js/app.js') }}" defer></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
</body> 

</html>
