@extends('frontend.master.master')
@section('title','Trang chủ')
@section('content')
@section('home','class=active')
	<!-- main -->
	<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="/product" class="f-product-1" style="background-image: url(images/item-1.jpg);">
							<div class="desc">
								<h2>Mẫu <br>cho <br>Nam</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="/product" class="f-product-2" style="background-image: url(images/item-2.jpg);">
									<div class="desc">
										<h2> <br>Váy <br> Mới</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="/product" class="f-product-2" style="background-image: url(images/item-4.jpg);">
									<div class="desc">
										<h2>Sale <br>20% <br>off</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="/product" class="f-product-2" style="background-image: url(images/item-3.jpg);">
									<div class="desc">
										<h2>Giầy <br>cho <br>Nam</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);"
		 data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Đặt hàng hôm nay,nhận ngay khuyến mãi!</h3>
									<p>Đã có hơn 1000 đơn hàng được gửi đi ở khắp quốc gia.</p>
									<p><a href="/product" class="btn btn-primary">Mua ngay</a> <a href="/product" class="btn btn-primary btn-outline">Đọc
											thêm</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
					</div>
				</div>
				<div class="row">
					@foreach ($featured_prds as $featured_prd)
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" onclick="location.href='/product/detail/{{$featured_prd->slug}}-{{$featured_prd->id}}.html'" style="background-image: url(/backend/img/{{$featured_prd->img}});cursor:pointer">

									<div class="cart">
										<p>
											<span class="addtocart"><a href="/product/detail/{{$featured_prd->slug}}-{{$featured_prd->id}}.html"><i class="icon-shopping-cart"></i></a></span>
											<span><a href="/product/detail/{{$featured_prd->slug}}-{{$featured_prd->id}}.html"><i class="icon-eye"></i></a></span>
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="/product/detail/{{$featured_prd->slug}}-{{$featured_prd->id}}.html">{{$featured_prd->name}}</a></h3>
									<p class="price"><span>{{number_format($featured_prd->price,0,"",",")}} VNĐ</span> </p>
								</div>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row ">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2019</p>
					</div>
				</div>
				<div class="row shop-container">
					@foreach ($new_prds as $new_prd)
						<div class="col-md-3 text-center">
							<div class="product-entry">
							
								<div class="product-img" onclick="location.href='/product/detail/{{$new_prd->slug}}-{{$new_prd->id}}.html'" style="background-image: url(/backend/img/{{$new_prd->img}});cursor:pointer">
									<p class="tag"><span class="new">New</span></p>
									<div class="cart">
										<p>
											<span class="addtocart"><a href="/product/detail/{{$new_prd->slug}}-{{$new_prd->id}}.html"><i class="icon-shopping-cart"></i></a></span>
											<span><a href="/product/detail/{{$new_prd->slug}}-{{$new_prd->id}}.html"><i class="icon-eye"></i></a></span>


										</p>
									</div>
								</div>
							
								<div class="desc">
									<h3><a href="/product/detail/{{$new_prd->slug}}-{{$new_prd->id}}.html">{{$new_prd->name}}</a></h3>
									<p class="price"><span>{{number_format($new_prd->price,0,"",",")}} VNĐ</span> </p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
@section('script')
	@parent
	{{-- js for toastr --}}
	<link href="css/toastr.min.css" rel="stylesheet">
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<script>
			@if(Session::has('message'))
				var type="{{Session::get('alert-type','info')}}"
				switch(type){
					case 'info':
						 toastr.info("{{ Session::get('message') }}");
						 break;
					case 'success':
						toastr.success("{{ Session::get('message') }}");
						break;
					 case 'warning':
						toastr.warning("{{ Session::get('message') }}");
						break;
					case 'error':
						toastr.error("{{ Session::get('message') }}");
						break;
				}
			@endif
	</script>
	

	{{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#user-table').DataTable();
        } );
    </script> --}}
@endsection