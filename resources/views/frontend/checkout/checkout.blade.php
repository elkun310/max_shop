@extends('frontend.master.master')
@section('title','Thanh toán')
@section('content')
@section('cart','active')
	<!-- main -->

	<div class="colorlib-shop">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-10 col-md-offset-1">
					<div class="process-wrap">
						<div class="process text-center active">
							<p><span>01</span></p>
							<h3>Giỏ hàng</h3>
						</div>
						<div class="process text-center active">
							<p><span>02</span></p>
							<h3>Thanh toán</h3>
						</div>
						<div class="process text-center">
							<p><span>03</span></p>
							<h3>Hoàn tất thanh toán</h3>
						</div>
					</div>
				</div>
			</div>
			<form method="POST" class="colorlib-form">
			@csrf
			<div class="row">
				<div class="col-md-7">
					{{-- @if(Auth::check() && Auth::user()->level==3)
					<form method="post" class="colorlib-form" id="checkout-form">
							<h2>Chi tiết thanh toán</h2>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">Họ & Tên</label>
									<input type="text" name="full" class="form-control" placeholder="Full Name" value="{{Auth::user()->full}}">
									{{showError($errors,'full')}}
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="fname">Địa chỉ</label>
										<input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ của bạn" value="{{Auth::user()->address}}">
									</div>
								</div>
	
								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Địa chỉ email</label>
										<input type="email" name="email" class="form-control" placeholder="Ex: youremail@domain.com" value="{{Auth::user()->email}}">
										{{showError($errors,'email')}}
									</div>
									<div class="col-md-6">
										<label for="Phone">Số điện thoại</label>
										<input type="text" name="phone" class="form-control" placeholder="Ex: 0123456789" value="{{Auth::user()->phone}}">
									{{showError($errors,'phone')}}
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12" id="rdb-multi">
										<h4 style="margin: 15px 0 -8px;">Hình thức thanh toán</h4><br>
										<div class="row">
											<div class="col-md-6">
												<input type="radio" name="checkout_type" checked="checked" id="checkout1" value="1"/>
												<label for="checkout1" style="cursor: pointer"><strong>Thanh toán khi nhận hàng</strong></label>
												
											</div>
											<div class="col-md-6">
												<input type="radio" name="checkout_type" id="checkout2" value="2"/>
												<label for="checkout2" style="cursor: pointer"><strong>Thanh toán với ngân lượng</strong></label>
												
											</div>
										</div>
										<p class="checkout-detail1" style="padding-top: 5px;">Vui lòng chuẩn bị sẵn số tiền in trên giá trị hóa đơn khi bên vận chuyển gọi điện nhận hàng và thanh toán với bên vận chuyển</p>
										<p class="checkout-detail2" style="display: none;padding-top: 5px;">Thanh toán thông qua Ví điện tử và Cổng Thanh toán Trực tuyến Ngân Lượng</p>
									</div>
								</div>
							</div>
						</form>
					@elseif(Auth::check()!=true) --}}
					<form method="post" class="colorlib-form" id="checkout-form">
							<h2>Chi tiết thanh toán</h2>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">Họ & Tên</label>
										<input type="text" name="full" class="form-control" placeholder="Full Name">
									{{showError($errors,'full')}}
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="fname">Địa chỉ</label>
										<input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ của bạn">
									</div>
								</div>
	
								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Địa chỉ email</label>
										<input type="email" name="email" class="form-control"
										placeholder="Ex: youremail@domain.com">
										{{showError($errors,'email')}}
									</div>
									<div class="col-md-6">
										<label for="Phone">Số điện thoại</label>
										<input type="text" name="phone" class="form-control" placeholder="Ex: 0123456789">
									{{showError($errors,'phone')}}
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12" id="rdb-multi">
										<h4 style="margin: 15px 0 -8px;">Hình thức thanh toán</h4><br>
										<div class="row">
											<div class="col-md-6">
												<input type="radio" name="checkout_type" checked="checked" id="checkout1" value="1"/>
												<label for="checkout1" style="cursor: pointer"><strong>Thanh toán khi nhận hàng</strong></label>
												
											</div>
											<div class="col-md-6">
												<input type="radio" name="checkout_type" id="checkout2" value="2"/>
												<label for="checkout2" style="cursor: pointer"><strong>Thanh toán với ngân lượng</strong></label>
												
											</div>
										</div>
										<p class="checkout-detail1" style="padding-top: 5px;">Vui lòng chuẩn bị sẵn số tiền in trên giá trị hóa đơn khi bên vận chuyển gọi điện nhận hàng và thanh toán với bên vận chuyển</p>
										<p class="checkout-detail2" style="display: none;padding-top: 5px;">Thanh toán thông qua Ví điện tử và Cổng Thanh toán Trực tuyến Ngân Lượng</p>
									</div>
								</div>
							</div>
						</form>
					{{-- @endif() --}}
					
					{{-- <form method="post" class="colorlib-form" id="checkout-form">
						<h2>Chi tiết thanh toán</h2>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="fname">Họ & Tên</label>
									<input type="text" name="full" class="form-control" placeholder="Full Name">
								{{showError($errors,'full')}}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="fname">Địa chỉ</label>
									<input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ của bạn">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6">
									<label for="email">Địa chỉ email</label>
									<input type="email" name="email" class="form-control"
									placeholder="Ex: youremail@domain.com">
									{{showError($errors,'email')}}
								</div>
								<div class="col-md-6">
									<label for="Phone">Số điện thoại</label>
									<input type="text" name="phone" class="form-control" placeholder="Ex: 0123456789">
								{{showError($errors,'phone')}}
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" id="rdb-multi">
									<h4 style="margin: 15px 0 -8px;">Hình thức thanh toán</h4><br>
									<div class="row">
										<div class="col-md-6">
											<input type="radio" name="checkout_type" checked="checked" id="checkout1" value="1"/>
											<label for="checkout1" style="cursor: pointer"><strong>Thanh toán khi nhận hàng</strong></label>
											
										</div>
										<div class="col-md-6">
											<input type="radio" name="checkout_type" id="checkout2" value="2"/>
											<label for="checkout2" style="cursor: pointer"><strong>Thanh toán với ngân lượng</strong></label>
											
										</div>
									</div>
									<p class="checkout-detail1" style="padding-top: 5px;">Vui lòng chuẩn bị sẵn số tiền in trên giá trị hóa đơn khi bên vận chuyển gọi điện nhận hàng và thanh toán với bên vận chuyển</p>
									<p class="checkout-detail2" style="display: none;padding-top: 5px;">Thanh toán thông qua Ví điện tử và Cổng Thanh toán Trực tuyến Ngân Lượng</p>
								</div>
							</div>
						</div>
					</form> --}}
				</div>
				<div class="col-md-5">
					<div class="cart-detail">
						<h2>Tổng Giỏ hàng</h2>
						<ul>
							<li>
								<ul>
									<?php $sum_quantity=0;?>
									@foreach ($cart as $product)
										{{-- <p>{{$product->qty}}*{{$product->price}}</p> --}}
										<?php 
										$sum_quantity=$sum_quantity+$product->qty;
										?>
										{{-- <input type="hidden" name="checkout_qty" value="{{$product->qty}}"> --}}
										
										<li><span>{{$product->qty}} x {{$product->name}}
											<br>(@foreach ($product->options->attr as $key => $value)
												{{$key}}: {{$value}}
											@endforeach)</span>
										<span>{{number_format($product->price,0,"",",")}} VNĐ</span></li>
									@endforeach
									<input type="hidden" name="checkout_price" value="{{str_replace( ',', '',$total)}}">
									<input type="hidden" name="checkout_qty" value="{{$sum_quantity}}">
									
								</ul>
							</li>

							<li><span>Tổng tiền đơn hàng</span> <span>{{$total}} VNĐ</span></li>
						</ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<p><button type="submit" class="btn btn-primary btn-submit">Thanh toán</button></p>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>

	<!-- end main -->
@endsection
@section('script')
	@parent
	<script>
		$("#checkout-form").submit(function (e) {
			//disable the submit button
			$(".btn-submit").attr("disabled", true);
			return true;

		});
	</script>
	<script>
        $('#rdb-multi input[name=checkout_type]').change(function() {
            if ($(this).val() == '2') {
				$(".checkout-detail1").fadeOut();
                $(".checkout-detail2").fadeIn();
               
            }
            else if ($(this).val() == '1') {
                $(".checkout-detail1").fadeIn();
                $(".checkout-detail2").fadeOut();
            }
        });

	</script>
@endsection