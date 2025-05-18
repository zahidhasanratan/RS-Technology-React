<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('admin/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('admin/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="{{ asset('admin/assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="{{ asset('admin/assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />

    @stack('css')
</head>
<body>
<div id="wrapper">
        @if(Request::is('admin*'))
            @include('layouts.partial.topbar')
        @endif
        <!-- /. NAV TOP  -->
        @if(Request::is('admin*'))
            @include('layouts.partial.sidebar')
        @endif

    <!-- /. NAV SIDE  -->
        @yield('content')
    <!-- /. PAGE WRAPPER  -->
</div>

<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{ asset('admin/assets/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('admin/assets/js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ asset('admin/assets/js/jquery.metisMenu.js')}}"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="{{ asset('admin/assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('files/assets/js/custom.js')}}"></script>
<script src="{{ asset('files/assets/ckeditor/ckeditor.js')}}"></script>
</body>
</html>
