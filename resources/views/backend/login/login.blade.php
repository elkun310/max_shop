<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<base href="{{asset('').'backend/'}}">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">


	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<style>
	body{
		margin: 0;
		padding: 0;
	}
	.field-icon {
		float: right;
		margin-left: -25px;
		margin-top: -30px;
		position: relative;
		z-index: 2;
		cursor: pointer;
		padding-right: 20px;
		}
	.form-group .fa-user {
		position: absolute;
		right: 38px;
		top: 77px;
		color: #dedede;
		font-size: 16px;
		line-height: 40px;
		}
	</style>
	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	{{-- <div class="row"> --}}
		{{-- <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="POST">
						@csrf
						<fieldset>
							<div class="form-group">
							<input class="form-control" placeholder="E-mail/Số điện thoại" name="email" type="" autofocus="" value="{{old('email')}}">
							<span class="fa fa-user"></span>
							</div>
							{{showError($errors,'email')}}
							<div class="form-group">
								<input id="pass" autocomplete="on" class="form-control" placeholder="Password" name="password" type="password" value="" >
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
							</div>
							{{showError($errors,'password')}}
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col--> --}}
	{{-- </div><!-- /.row --> --}}
	<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="images/img-01.png" alt="IMG">
					</div>
	
					<form class="login100-form validate-form" method="POST">
						@csrf
						<span class="login100-form-title">
							MAXSHOP 
						</span>
	
						<div class="wrap-input100 validate-input" data-validate = "Tên đăng nhập không được để trống">
							<input class="input100" type="text" placeholder="E-mail/Số điện thoại" name="email" autofocus="" value="{{old('email')}}">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							
						</div>
						{{showError($errors,'email')}}
						<div class="wrap-input100 validate-input" data-validate = "Mật khẩu không được để trống">
							<input class="input100" placeholder="Password" id="pass" name="password" type="password" value="">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
						</div>
						{{showError($errors,'password')}}
						<div class="checkbox" style="margin-left: 10px;">
							<label>
								<input name="remember" type="checkbox" value="Remember Me">Remember Me
							</label>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
	
						<div class="text-center p-t-12">
							<span class="txt1">
								Forgot
							</span>
							<a class="txt2" href="#">
								Username / Password?
							</a>
						</div>
	
						<div class="text-center p-t-136">
							<a class="txt2" href="#">
								Create your Account
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	{{-- <script src="js/easypiechart-data.js"></script> --}}
	<script src="js/bootstrap-datepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/tilt/tilt.jquery.min.js"></script>
		<script >
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>
	<script>
		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			if ($("#pass").attr('type')==="password") {
				$("#pass").attr('type','text');
			}else{
				$("#pass").attr('type','password');
			}
		});
	</script>
	<script>
		! function ($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
	 <script>
		$(document).ready(function(){
			$('.btn-remove').click(function(){
				$(this).parents('.thongbao').fadeOut();
			});
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
</body>

</html>