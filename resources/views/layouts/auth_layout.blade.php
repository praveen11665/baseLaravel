<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <title>Project Name</title>

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">

  <!-- Bootstrap CDN -->
  <link href="https://bootswatch.com/4/cosmo/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Cosmo from bootswatch -->

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

  <!-- Popper CSN (Bootstrap 4 requires this to work)-->
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>

  <!-- Bootstrap CDN -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

  <link href="{{ asset('/css/strawberry.login.css') }}" rel="stylesheet" />
  <script src="{{ asset('/js/views/login.js') }}"></script>

  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" />

  <script type="text/javascript">
    //Globally Set Web URL
    var l      = window.location;
    var WEBURL = l.protocol + "//" + l.host ;

    //Ajax Setup Token
    $(function () { 
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
    });
  </script>
</head>
<body>
  <div class="login-wrapper bg-gradient-default">
    <span class="circle-style circle-1-child"></span>
    <span class="circle-style circle-2-child"></span>
    <span class="circle-style circle-3-child"></span>
    <span class="circle-style circle-4-child"></span>
    <span class="circle-style circle-5-child"></span>
    <span class="circle-style circle-6-child"></span>
    <span class="circle-style circle-7-child"></span>
    <span class="circle-style circle-8-child"></span>
    <div class="login-panel">
      <div class="login-logo">
        <img class="sidebar-logo" src="{{ asset('/img/logo.png') }}" />
      </div>
        @yield('content')
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
    </div>
    <div class="login-footer-panel">
      <a href="#">Terms & Conditions</a>
      <a href="#">Privacy Policy</a>
    </div>
  </div>
</body>
</html>