<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kominfo | komponen</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fa fa-list"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="{{url('dist/img/Logo_Kota_Malang_color.png')}}" alt="#" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Kominfo</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('dist/img/user.png')}}" class="img-circle elevation-2" alt="#">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/home') }}"class="nav-link">
                                <i class="fa fa-dashboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/asset') }}" class="nav-link">
                                <i class=" fa fa-desktop"></i>
                                <p>
                                    Asset
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/komponen') }}" class="nav-link">
                                <i class="fa fa-list"></i>
                                <p>
                                    Komponen
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/software') }}" class="nav-link">
                                <i class=" fa fa-code"></i>
                                <p>
                                    software
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/sdm') }}" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/transaksi') }}" class="nav-link">
                                <i class="fa fa-exchange"></i>
                                <p>
                                    transaksi
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a onclick="document.getElementById('logout-form1').submit();"
                            style="cursor: pointer" class="nav-link">
                            <form id="logout-form1" method="post" style="display: none" action="{{ url('logout') }}">@csrf
                            </form>
                                <i class="fa fa-sign-out"></i>
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
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>2022<a>Kominfo</a>.</strong>
            MAHASISWA POLINEMA
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        </script>
        
    <!-- AdminLTE for demo purposes -->
   
    @yiled('add')
    <!-- Page specific script -->
    <script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
     
    });
  });
</script>
<script>
    function cekBarangYangSudahPinjam(id)
    {
        $.get("{{url('transaksi_get_pinjam')}}"+"/"+id, function(data){
           // console.log(data);
            if(data.asset.length > 0)
            {
               // alert('sip');
               for (let index = 0; index < data.asset.length; index++) {
                   
                    $('#asset_val'+data.asset[index]).prop('disabled',true);
                
               }
            }
            if(data.komponen.length > 0)
            {
               // alert('sip');
               for (let index = 0; index < data.komponen.length; index++) {
                   
                    $('#komponen_val'+data.komponen[index]).prop('disabled',true);
                
               }
            }
            if(data.software.length > 0)
            {
               // alert('sip');
               for (let index = 0; index < data.software.length; index++) {
                   
                    $('#software_val'+data.software[index]).prop('disabled',true);
                
               }
            }
        });
    }
    </script>
</body>

</html>
