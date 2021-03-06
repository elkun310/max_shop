<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <base href="{{asset('frontend')}}/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@section('css')
		<link rel="stylesheet" href="css/elkun.css">
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">

		<!-- Owl Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Date Picker -->
		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<!-- Flaticons  -->
		<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/custome.css">
		<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
	@show
	
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>


</head>

<body>
	<!--header -->
	<div class="colorlib-loader"></div>
	<div id="page">
		@include('frontend.master.header')
		@include('frontend.master.sidebar')
	<!-- End header -->
		@yield('content')

		@include('frontend.master.subcribe')
		@include('frontend.master.footer')
		{{-- <div id="__back2top" title="Trở về đầu trang" class="active">
            <i class="icon1 icon-back2top"></i>
        </div> --}}
	</div>


	@section('script')
        <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	 <!--Start of Tawk.to Script-->
	 <script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5d7a38b79f6b7a4457e154ec/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script>
	<!--End of Tawk.to Script-->
	<script>
		$('.sb-submit').click(function(e){
			if($('.sb-text').val().length<=0)
			{
				e.preventDefault();
			}
			//$('.sb-text').toggleClass('open');
		})
	</script>
	<script src="js/elkun.js"></script>
    @show
</body>

</html>