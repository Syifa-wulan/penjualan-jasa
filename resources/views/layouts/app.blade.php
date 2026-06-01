<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Dashboard') &mdash; Arcline Studio</title>

  <link rel="stylesheet" href="{{asset('')}}assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('')}}assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
  <link rel="stylesheet" href="{{asset('')}}assets/css/components.css">
  
  @stack('styles')
  
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  </head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      {{-- Navbar --}}
      @include('layouts.navbar')

      {{-- Sidebar --}}
      @include('layouts.sidebar')

      {{-- Main Content --}}
      @yield('content')

      {{-- Footer --}}
      @include('layouts.footer')
    </div>
  </div>

  <script src="{{asset('')}}assets/modules/jquery.min.js"></script>
  <script src="{{asset('')}}assets/modules/popper.js"></script>
  <script src="{{asset('')}}assets/modules/tooltip.js"></script>
  <script src="{{asset('')}}assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('')}}assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{asset('')}}assets/modules/moment.min.js"></script>
  <script src="{{asset('')}}assets/js/stisla.js"></script>
  
  <script src="{{asset('')}}assets/js/scripts.js"></script>
  <script src="{{asset('')}}assets/js/custom.js"></script>

  @stack('scripts')
</body>

</html>