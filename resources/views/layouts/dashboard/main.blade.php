<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Website Dreamss menyediakan berbagai macam pilihan hotel pilihan untuk anda" />
    <meta name="keywords" content="Hotel">
    <meta name="author" content="IT Club">
    <link rel="icon" href="{{asset('site_/img/logo.png')}}" sizes="16x16 32x32" type="image/png">
   

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <!-- Custom styles for this template-->
  <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
  
  @stack('header')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      @include('layouts.dashboard.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.dashboard.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('judul')</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            @include('sweetalert::alert')
          	@yield('content')
            
            </div>
          </div>

        
      <!-- End of Main Content -->
</div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->

  <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  
  {{-- <script src="{{asset('dashboard/js/ckeditor.js')}}"></script> --}}
  
  <!-- Custom scripts for all pages-->
  <script src="{{asset('dashboard/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('dashboard/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('dashboard/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('dashboard/js/demo/chart-pie-demo.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  @stack('footer')
</body>

</html>
