<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- iCheck -->
  <!-- JQVMap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Daterange picker -->
  <!-- summernote -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
  

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('')}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('')}}dist/img/user2-160x160.jpg" class="img-circle elevation-3 mt-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('username')}}</a>
          <a href="#" class="d-block">{{session('level')}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   
      
         
        
         
          
          <li class="nav-header">FITUR</li>
          @if(session('level')=="Super Admin")
          
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/negara" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Negara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pelabuhan" class="nav-link">
              <i class="nav-icon fas fa-ship"></i>
              <p>
                Pelabuhan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kapal" class="nav-link">
              <i class="nav-icon fas fa-ship"></i>
              <p>
                Kapal Cargo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kontainer" class="nav-link">
              <i class="nav-icon fas fa-pallet"></i>
              <p>
                Kontainer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pengiriman" class="nav-link">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Pengiriman
              </p>
            </a>
          </li>
         
          @else
          <li class="nav-item">
            <a href="/datapengiriman" class="nav-link">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Pengiriman
              </p>
            </a>
          </li>
          @endif
           <li class="nav-item">
            <a href="/logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('subtitle')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('subtitle')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('')}}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<!-- JQVMap -->
<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- Summernote -->
<!-- overlayScrollbars -->
<script src="{{asset('')}}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('')}}dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('')}}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('')}}plugins/jszip/jszip.min.js"></script>
<script src="{{asset('')}}plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('')}}plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/dist/js/update.js')}}"></script>
<script src="{{asset('/dist/js/pelabuhan.js')}}"></script>

<script>




  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "csv", "excel", "pdf", ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "paging": false,
      "searching": false,
      "info":false,
      "buttons": [ "csv", "excel", "pdf", ]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    

  });
</script>
</body>
</html>
