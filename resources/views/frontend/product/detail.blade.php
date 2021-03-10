@extends('frontend.master.master')
@section('title','Trang chi tiết sản phẩm')
@section('css')
	@parent
	<style>
		.thumbnail {
    		padding:0px;
		}
		.panel {
			position:relative;
			margin-bottom: 20px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		.panel-body {
    		padding: 15px;
		}
		.panel>.panel-heading:after,.panel>.panel-heading:before{
			position:absolute;
			top:11px;left:-16px;
			right:100%;
			width:0;
			height:0;
			display:block;
			content:" ";
			border-color:transparent;
			border-style:solid solid outset;
			pointer-events:none;
		}
		.panel>.panel-heading:after{
			border-width:7px;
			border-right-color:#f7f7f7;
			margin-top:1px;
			margin-left:2px;
		}
		.panel>.panel-heading:before{
			border-right-color:#ddd !important;
			border-width:8px;
		}
		.panel-default {
   			border-color: #ddd !important;
		}

		input[type=text], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;
		}
		input[type=email], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 16px;
			resize: vertical;
			height: 50px;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.comment-wrapper {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		}
		.list-comment{
			margin-top: 20px;
			background: #cccccc69;
			border-radius: 4px;
			padding: 20px;
		}
	</style>
@endsection
@section('content')
@section('product','active')
			<!-- main -->
			<div class="colorlib-shop">
				<div class="container">
					<div class="row row-pb-lg">
						<div class="col-md-10 col-md-offset-1">
							<div class="product-detail-wrap">
								<div class="row">
									<div class="col-md-5">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(/backend/img/{{$product->img}});">
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<form action="/cart/add" method="get">
	
											<div class="desc">
												<h3>{{$product->name}}</h3>
												<p class="price">
													<span>{{number_format($product->price,0,"",",")}} VNĐ</span>
												</p>
												<p>{!!$product->info!!}</p>
												@foreach (attr_values($product->values) as $key=>$value)
													<div class="size-wrap">
														<p class="size-desc">
															{{$key}}:
															@foreach ($value as $item)
																<a class="size">{{$item}}</a>
															@endforeach
														</p>
													</div>
												@endforeach
												
												<h4>Lựa chọn</h4>
												<div class="row">
													@foreach (attr_values($product->values) as $key=>$value)
													<div class="col-md-3">
														<div class="form-group">
															<label>{{$key}}:</label>
															<select class="form-control " name="attr[{{$key}}]" id="">
																
																@foreach ($value as $item)
																	<option value="{{$item}}"> {{$item}}</option>
																	
																@endforeach
	
															</select>
														</div>
													</div>
													@endforeach
												
	
												</div>
												<div class="row row-pb-sm">
													<div class="col-md-4">
														<div class="input-group">
															<span class="input-group-btn">
																<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																	<i class="icon-minus2"></i>
																</button>
															</span>
															<input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1" max="100">
															<span class="input-group-btn">
																<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																	<i class="icon-plus2"></i>
																</button>
															</span>
														</div>
													</div>
												</div>
											<input type="hidden" name="id_product" value="{{$product->id}}">
												@if(Auth::check() && Auth::user()->level==3)
													<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
												@elseif(Auth::check()!=true || Auth::user()->level!=3)
													<p><button class="btn btn-primary btn-addtocart" id="login" type="submit"> Thêm vào giỏ hàng</button></p>
												@endif()
												
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="row">
								<div class="col-md-12 tabulation">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
									</ul>
									<div class="tab-content">
										<div id="description" class="tab-pane fade in active">
											{!!$product->describe!!}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--send comment-->
			@if (session('thongbao'))
				<div class="alert bg-success thongbao" role="alert">
					<svg class="glyph stroked checkmark">
						<use xlink:href="#stroked-checkmark"></use>
					</svg>{{session('thongbao')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
				</div>
			@endif
			<div class="container comment-wrapper">
				<form action="" method="POST" id="form-comment">
					@csrf
					<label for="fname">Họ và tên</label>
					<input type="text" id="fname" name="name" placeholder="Họ và tên của bạn..">
					{{showError($errors,'name')}}
					<label for="lname">Email</label>
					<input type="email" id="email" name="email" placeholder="Email của bạn..">
					{{showError($errors,'email')}}
					<label for="subject">Nội dung gửi</label>
					<textarea id="subject" name="content" placeholder="Mời nhập..." style="height:100px"></textarea>
					{{showError($errors,'content')}}
					<input type="hidden" name="id_product" value="{{$product->id}}">
					<input style="float:right;background: #FFC300;" type="submit" value="Gửi đánh giá">
				</form>
			</div>

			<!--end send comment-->
			{{-- comment --}}
			<div class="container list-comment">
				<div class="row">
					<div class="col-sm-12">
						<h3>Bình luận</h3>
					</div><!-- /col-sm-12 -->
				</div><!-- /row -->
				<div class="row">
					
					@foreach ($comments as $comment)
						<div class="col-sm-1">
							<div class="thumbnail">
								<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
							</div><!-- /thumbnail -->
						</div><!-- /col-sm-1 -->
						<div class="col-sm-11">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong>{{$comment->name}}</strong> <span class="text-muted">{{$comment->created_at->format('d-m-Y')}}</span>
									<br><i>{{$comment->email}}</i>
								</div>
								<div class="panel-body">
									{{$comment->content}}
								</div><!-- /panel-body -->
							</div><!-- /panel panel-default -->
						</div><!-- /col-sm-5 -->
					@endforeach
					
				</div><!-- /row -->
				<div align='right'>
					{{$comments->links('vendor.pagination.default')}}
				</div>
				
			</div><!-- /container -->
			{{-- end-comment --}}

			<div class="colorlib-shop">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
							<h2><span>Sản phẩm Mới</span></h2>
						</div>
					</div>
					<div class="row">
						@foreach ($new_products as $new_product)
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img"  onclick="location.href='/product/detail/{{$new_product->slug}}-{{$new_product->id}}.html'" style="cursor:pointer;background-image: url(/backend/img/{{$new_product->img}});">
									<p class="tag"><span class="new">New</span></p>
									<div class="cart">
										<p>
											<span class="addtocart"><a href="/product/detail/{{$new_product->slug}}-{{$new_product->id}}.html"><i class="icon-shopping-cart"></i></a></span>
											<span><a href="/product/detail/{{$new_product->slug}}-{{$new_product->id}}.html"><i class="icon-eye"></i></a></span>
	
	
										</p>
									</div>
								</div>
								<div class="desc">
								<h3><a href="/product/detail/{{$new_product->slug}}-{{$new_product->id}}.html">{{$new_product->name}}</a></h3>
									<p class="price"><span>{{number_format($new_product->price,0,"",",")}} VNĐ</span></p>
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
	{{-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
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
	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>
	<script>
		$(document).ready(function(){
			$('#login').on('click',function(e){
				e.preventDefault();
				console.log('aa');
				$('#modalSignIn').addClass('in');
				$('#modalSignIn').css('display','block');
				$('#modalSignIn .modal-content').css('background-color','#ccc');
			})
			$('.close').on('click',function(){
				$('#modalSignIn').removeClass('in');
				$('#modalSignIn').css('display','none');
			})
			$('.btn-close').on('click',function(){
				$('#modalSignIn').removeClass('in');
				$('#modalSignIn').css('display','none');
			})

		})
	</script>
@endsection