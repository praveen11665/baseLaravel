<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Project Name</title>

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">

  <!-- Animate.CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- jQuery-UI Framework -->
  <script src="{{ asset('\js\jQueryUI\jquery-ui.min.js') }}"></script>
  <link href="{{ asset('\js\jQueryUI\jquery-ui.structure.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('\js\jQueryUI\jquery-ui.min.css') }}" rel="stylesheet" />

  <!-- Popper CSN (Bootstrap 4 requires this to work)-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
  integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
  crossorigin="anonymous"></script>

  <!-- Bootstrap CDN -->
  <link href="https://bootswatch.com/4/cosmo/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Cosmo from bootswatch -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
  integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
  crossorigin="anonymous"></script>

  <!-- Bootstrap Overrides - JONES -->
  <link href="{{ asset('/css/bootstrap.overrides.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/bootstrap.xxl.css') }}" rel="stylesheet" />

  <!-- Strawberry CSS - JONES -->
  <link href="{{ asset('/css/strawberry.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/strawberry.min.768.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" />
  <!-- Responsive CSS -->
  <link href="{{ asset('/css/strawberry.utilities.css') }}" rel="stylesheet" />
  <!-- Utility CSS -->

  <!-- Strawberry JS - JONES -->
  <script src="{{ asset('/js/strawberry.core.js') }}"></script>
  <script src="{{ asset('/js/strawberry.js') }}"></script>

  <!--DATATABLES-->
  <link href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
  <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

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
    });
   });
  </script>
</head>
<body>
  <div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="d-none d-lg-block">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="{{ asset('/home') }}">
            <img class="sidebar-logo" src="{{ asset('/img/logo.png') }}" />
          </a>
        </li>

        <li class="sidebar-user clearfix">
          <span class="sidebar-user-image">
            <img src="{{ asset('/img/astrid_farnsworth.jpg') }}" />
          </span>
          <span class="sidebar-user-name">
            <h6 class="mb-0">{{ ucfirst(Auth::user()->name) }}</h6>
            <small class="sidebar-user-role">Admin</small>
          </span>
          <a class="sidebar-user-edit float-right" data-toggle="tooltip" title="Edit Profile" data-placement="bottom"><i class="fas fa-pencil-alt fa-fw"></i></a>
        </li>

        <li class="active">
          <a href="{{ route('home') }}" data-toggle="tooltip" title="Dashboard">
            <i class="fas fa-home fa-fw mr-1"></i> Dashboard
          </a>
        </li>
        
        <li class="clearfix">
          <div class="submenu-wrapper">
            <a class="" data-toggle="submenu" data-target="#ddAcc" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="fas fa-cog mr-2"></i> Setting
              <span class="fas fa-caret-right float-right"></span>
            </a>
            <div class="submenu" id="ddAcc" data-parent=".sidebar-nav">
              <a class="submenu-item" href="{{ route('role')}}" data-workspace-src="dummy" data-title="404 - SmartBooks" data-page-header="Redirect">Role Management</a>
              <a class="submenu-item" href="{{ route('user')}}" data-workspace-src="dummy" data-title="404 - SmartBooks" data-page-header="Redirect">User Management</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!--/ Sidebar -->

    <!-- Page -->
    <div id="page-content-wrapper">
      <div class="page-header clearfix">
        <div class="float-left">
          <i class="fas fa-bars menu-toggle"></i>
          <div class="header-title">
            {{ isset($global_page_title) ? $global_page_title : 'Project Name' }}
          </div>
        </div>
        <div class="float-right">
          <span class="align-items-center d-md-flex d-none justify-content-center">
            <div class="dropdown d-none d-md-inline-block dropdown-company-change">
              <button id="btnGroupDrop3" type="button" class="btn btn-warning btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-greeting" ><i class="fas fa-cloud-sun"></i>
                Good Morning, </span><span class="global_company_name">{{ ucfirst(Auth::user()->name) }}</span> </button>
            </div> 

            <!--Logout Form-->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
            </form>

            <div class="dropdown d-inline-block">
              <div class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v right-menu-toggle"></i>
              </div>
              <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#"><i class="fas fa-user-circle mr-2"></i>Profile</a>
                <!--<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>-->
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
              </div>
            </div>
          </span>
        </div>
        <div class="float-right">
        </div>
      </div>
      <div class="workspace p-4" id="workspace">
          <div class="breadcrumb-wrapper" aria-label="Breadcrumb">
            {{ Breadcrumbs::render(Route::getCurrentRoute()->getName()) }}
          </div>
        @yield('content')
      </div>
    </div>
    <!--/ Page -->
  </div>
  <!--/ Wrapper -->

  <!-- MODAL WINDOW Add New content-->
  <div class="modal fade" id="form-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>   
          <h4 class="modal-title" style="position: absolute;">{{ isset($model_title) ? $model_title : 'TITLE' }}</h4>
        </div>
        <div class="modal-body" id="form-modal-body">
        </div>        
      </div>
    </div>
  </div>
    
  <aside class="toast-wrapper"></aside>
  @php(require_once(base_path().'\resources\views\common_js.blade.php'))
</body>
</html>