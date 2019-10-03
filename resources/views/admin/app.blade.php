<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Booking Liburan | Admin page</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/dropify/css/dropify.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"  href="{{ route('admin.auth.logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>
       <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('public/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Booking Liburan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{url('mitra/transaksi')}}" class="nav-link ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   Transaksi
                  </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="{{url('mitra/destinasi')}}" class="nav-link ">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Destinasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mitra/kota')}}" class="nav-link ">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Kota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mitra/paket')}}" class="nav-link ">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Paket
              </p>
            </a>
          </li>
          @if(Auth::user()->role == 1)
          <li class="nav-item">
            <a href="{{url('mitra/article')}}" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Article
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mitra/article')}}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen Mitra
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('public/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{asset('public/admin')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/dropify/js/dropify.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>

@yield('custom-script')

</body>
</html>