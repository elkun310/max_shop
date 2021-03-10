@extends('backend.master.master')
@section('title','Trang quản trị')
@section('content')
@section('admin','class=active')
	<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Tổng quan</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="font-weight:bold">Tổng quan</h1>
		</div>
	</div>
	<!--/.row-->
	{{-- <div class="row">
		<div class="col-xs-12 col-md-12 col-lg-6">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-4 widget-left">
						<span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
					</div>
					<div class="col-sm-9 col-lg-8 widget-right">
						<div class="large">{{number_format($dl['Tháng '.count($dl)],0,"",",")}} VNĐ</div>
						<div class="text-muted">Doanh thu tháng {{count($dl)}}</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message">
							<use xlink:href="#stroked-empty-message"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">52</div>
						<div class="text-muted">Tương tác</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{$unprocess}}</div>
						<div class="text-muted">Số đơn hàng chưa xử lý</div>
					</div>
				</div>
			</div>
		</div>

	</div> --}}
	<!--/.row-->

	<div class="row" style="margin: 0 -15px;">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="">
					{{-- <div class="row no-padding">
						{{-- <div class="col-sm-3 col-lg-4 widget-left">
							<span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
						</div>
						<div class="col-sm-9 col-lg-8 widget-right">
							<div class="large">{{number_format($dl['Tháng '.count($dl)],0,"",",")}} đ</div>
							<div class="text-muted">Doanh thu tháng {{count($dl)}}</div>
						</div> --}}
						
					{{-- </div> --}}
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3>{{number_format($dl['Tháng '.count($dl)],0,"",",")}}<sup style="font-size: 20px">đ</sup></h3>
									
									<p>Doanh thu tháng {{count($dl)}}</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="/admin/order/processed" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>{{$user}}</h3>
									
									<p>Quản trị viên</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="/admin/user" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
								<h3>{{$product}}</h3>
									
									<p>Sản phẩm</p>
								</div>
								<div class="icon">
									<i class="ion-tshirt"></i>
								</div>
								<a href="/admin/product" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>{{$unprocess}}</h3>
									
									<p>Đơn chưa xử lý</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="/admin/order/" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
				</div>
			</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Biểu đồ doanh thu</div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->

</div>
<!--end main-->
@endsection
@section('script')
	@parent
	<script>
			var lineChartData = {
			labels: [
				@foreach($dl as $key=>$value)
				"{{$key}}",
				@endforeach
				// "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7"
			],
			datasets: [
					{
						label: "My Second dataset",
						fillColor: "rgba(48, 164, 255, 0.2)",
						strokeColor: "rgba(48, 164, 255, 1)",
						pointColor: "rgba(48, 164, 255, 1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(48, 164, 255, 1)",
						data: [
							@foreach($dl as $key=>$value)
								{{$value}},
								// {{number_format($value,0,"",".")}},
							@endforeach
							// 1000000, 2000000, 3000000, 2000000, 5000000, 4000000, 8000000
						]
					}
				]
		
			}
		
			window.onload = function() {
				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
					responsive: true
				});
				// var chart2 = document.getElementById("bar-chart").getContext("2d");
				// window.myBar = new Chart(chart2).Bar(barChartData, {
				// 	responsive: true
				// });
				// var chart3 = document.getElementById("doughnut-chart").getContext("2d");
				// window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
				// 	responsive: true
				// });
				// var chart4 = document.getElementById("pie-chart").getContext("2d");
				// window.myPie = new Chart(chart4).Pie(pieData, {
				// 	responsive: true
				// });
		
			};
	</script>
@endsection