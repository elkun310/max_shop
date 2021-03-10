@extends('frontend.master.master')
@section('title','Giỏ hàng')
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
						<div class="process text-center">
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
			<div class="row row-pb-md">
				<div class="col-md-10 col-md-offset-1">
					<div class="product-name">
						<div class="one-forth text-center">
							<span>Chi tiết sản phẩm</span>
						</div>
						<div class="one-eight text-center">
							<span>Giá</span>
						</div>
						<div class="one-eight text-center">
							<span>Số lượng</span>
						</div>
						<div class="one-eight text-center">
							<span>Tổng</span>
						</div>
						<div class="one-eight text-center">
							<span>Xóa</span>
						</div>
					</div>
					@if (Cart::count()<1)
						<h4 style="color: red;text-align: center">Chưa có sản phẩm nào trong giỏ hàng</h4>
						<p style="text-align: center">
							<a href="/" class="btn btn-primary">Trang chủ</a>
							<a href="/product" class="btn btn-primary btn-outline">Tiếp tục mua sắm</a>
						</p>
					@endif
					@foreach ($cart as $item)
					<div class="product-cart">
						<div class="one-forth">
							<div class="product-img">
							<img class="img-thumbnail cart-img" src="/backend/img/{{$item->options->img}}">
							</div>
							<div class="detail-buy">
								<h4>Mã : {{$item->id}}</h4>
								<h5>{{$item->name}}</h5>
								<div class="row">
									@foreach ($item->options->attr as $key => $value)
										<div class="col-md-3"><strong>{{$key}}:{{$value}}</strong></div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<span class="price">{{number_format($item->price,0,"",",")}} đ</span>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<input type="number" onchange="change('{{$item->rowId}}',this.value)" id="quantity" name="quantity" class="form-control input-number text-center" value="{{$item->qty}}">
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<span class="price">{{number_format($item->price*$item->qty,0,"",",")}}đ</span>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<a onclick="return del('{{$item->rowId}}','{{$item->name}}')" class="closed" style="cursor:pointer"></a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			
				{{-- @foreach ($user_cart as $row)
					@foreach ($row->detail_cart as $detail)
						{{$detail->product_id}}
					@endforeach
				@endforeach	
				{{$product}} --}}
			


			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="total-wrap">
						<div class="row">
							<div class="col-md-8">

							</div>
							<div class="col-md-4 text-center">
								<div class="total">
									<div class="sub">
										<p><span>Tổng:</span> <span>{{$total}} VNĐ</span></p>
									</div>
									<div class="grand-total">
										<p><span><strong>Tổng cộng:</strong></span> <span>{{$total}} VNĐ</span></p>
										<a href="/checkout" class="btn btn-primary">Thanh toán <i class="icon-arrow-right-circle"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end main -->
@endsection
@section('script')
	@parent
	<script>
		function del(rowId,name){
				if(confirm('Bạn có thực sự muốn xóa sản phẩm '+name+' khỏi giỏ hàng ?'))
				{
					$.get('/cart/remove/'+rowId,
						function(data){
							if(data="success")
							{
								location.reload();
							}
						}
					);
				}
			}
		function change(rowId,qty){
			$.get("/cart/update/"+rowId+"/"+qty,
				function(data)
				{
					if(data="success")
					{
						location.reload();
					}
					else{
						alert('Cập nhật thất bại');
					}
					// alert(data);
				}
			);
		}
	</script>
@endsection