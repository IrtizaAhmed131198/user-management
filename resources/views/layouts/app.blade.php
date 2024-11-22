<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Management</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('assets/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="{{ asset('assets/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('assets/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">

        @yield('css');
    </head>

    <body>

        <div id="wrapper">

            @include('layouts.header')

            @include('layouts.sidebar')

            <div id="page-wrapper">
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

            @include('layouts.footer')

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('assets/js/startmin.js') }}"></script>

        <!-- DataTables JavaScript -->
        <script src="{{ asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

        <script>
            @if (Session::has('success'))
                toastr.success("{{ session('success') }}", 'Success');
            @endif
            @if (Session::has('error'))
                toastr.error("{{ session('error') }}", 'Error');
            @endif
        </script>

        @yield('js')

    </body>

</html>
