<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<!-- css -->
	<base href="{{asset('').'backend/'}}">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="Awesome/css/all.css">
    <link rel="stylesheet" href="css/elkun.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
    <!--adminlte-->
   
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="css/AdminLTE.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="icon" href="http://slimads.vn/images/faviconslimads.png" type="image/x-icon">
</head>
<body class="skin-blue sidebar-mini" style="height: auto;min-height: 100%;">
	@include('backend.master.header')
	@include('backend.master.sidebar')

    {{-- <div class="content-wrapper" style="min-height: 970px;margin-right: 10px;">
        @yield('content')
    </div> --}}
	@yield('content')

    @section('script')
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/adminlte.js"></script>
        <script>
            $(document).ready(function(){
                $('.btn-remove').click(function(){
                    $('.thongbao').fadeOut();
                });
                // $('.btn-remove').click(function(){
                //     $(this).parents('.notification-container').find('.thongbao').fadeOut();
                // })
                $(window).scroll(function(){
                    if(window.pageYOffset>10){
                        $('.main-sidebar').css('padding-top','0px');
                        $('.main-sidebar').css('transition','0.4s');
                    }
                    else{
                        $('.main-sidebar').css('padding-top','50px');
                    }
                });
            });
            
        </script>
    @show
</body>

</html>