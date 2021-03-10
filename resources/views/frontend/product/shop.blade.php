@extends('frontend.master.master')
@section('title','Trang sản phẩm')
@section('content')
@section('product','active')
	<!-- main -->
	<!--search-->
		<div class="search-box" style="margin-bottom: 40px;float: right;margin-right: 105px;">
			{{-- <form action="/search" method="get" id="form-seacrh"> --}}
			
				<input id="txb" name="keyword" type="text" class="sb-text open" placeholder="Nhập sản phẩm cần tìm kiếm ..."><i class="fa fa-search ic-search" style="font-size: 20px;"></i>
				<!--<button id="btn-search" type="" class="sb-submit" ><i class="fa fa-search" style="font-size: 20px;"></i></button>-->
			{{-- </form> --}}
		</div>

		{{-- <input type="text" class="form-controller" id="search" name="search"></input> --}}
	<!--end-search-->
	
	<!--ajax search-->
		{{-- <div class="ajax-search1">

		</div> --}}

	</div>
	<div class="colorlib-shop">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3 " >
					<img id="loading-image" src="/frontend/images/loading.gif" style="display:none;margin: auto;width:100%"/>
					<div class="row row-pb-lg shop-container ajax-search">
						@foreach ($products as $product)
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" onclick="location.href='/product/detail/{{$product->slug}}-{{$product->id}}.html'" style="background-image: url(/backend/img/{{$product->img}});cursor:pointer">
										<p class="tag"><span class="new">New</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html"><i class="icon-shopping-cart"></i></a></span>
												<span><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html"><i class="icon-eye"></i></a></span>

											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html">{{$product->name}}</a></h3>
										<p class="price"><span>{{number_format($product->price,0,"",",")}} VNĐ</span></p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12" align="right">
							{{$products->links('vendor.pagination.default')}}
						</div>
					</div>
				</div>
				<div class="col-md-3 col-md-pull-9">
					<div class="sidebar">
						<div class="side">
							<h2>Danh mục</h2>
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@foreach ($categories as $category)
										@if ($category->parent==0)
										<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingOne">
													<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#{{$category->id}}" aria-expanded="true" aria-controls="collapseOne">
															{{$category->name}}														
														</a>
													</h4>
												</div>
												<div id="{{$category->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
														<ul>
															@foreach ($categories as $item)
																@if ($item->parent==$category->id)
																	<li><a href="/product/{{$item->slug}}.html">{{$item->name}}</a></li>
																@endif
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										@endif
										
									@endforeach
									


								</div>
							</div>
						</div>
						<div class="side">
							<h2>Khoảng giá</h2>
							<form method="get" class="colorlib-form-2">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="guests">Từ:</label>
											<div class="form-field">
												<i class="icon icon-arrow-down3"></i>
												<select name="start" id="people" class="form-control">
													<option value="100000">100.000 VNĐ</option>
													<option value="200000">200.000 VNĐ</option>
													<option value="300000">300.000 VNĐ</option>
													<option value="500000">500.000 VNĐ</option>
													<option value="1000000">1.000.000 VNĐ</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="guests">Đến:</label>
											<div class="form-field">
												<i class="icon icon-arrow-down3"></i>
												<select name="end" id="people2" class="form-control">
													<option value="2000000">2.000.000 VNĐ</option>
													<option value="4000000">4.000.000 VNĐ</option>
													<option value="6000000">6.000.000 VNĐ</option>
													<option value="8000000">8.000.000 VNĐ</option>
													<option value="10000000">10.000.000 VNĐ</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
							</form>
						</div>
						@foreach ($attrs as $attr)
							<div class="side">
								<h2>{{$attr->name}}</h2>
								<div class="size-wrap">
									<p class="size-desc">
										@foreach ($attr->values as $value)
											<a href="/product?value={{$value->id}}" class="attr" style="@if(isset($_GET['value']) && $_GET['value']==$value->id){{"color:#FFC300"}} @else {{""}} @endif">{{$value->value}}</a>
										@endforeach
									</p>
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main -->
@endsection
@section('script')
	@parent
	{{-- <script>
		$('#search').on('keyup', function () {
			$.ajax({
				type : 'get',
				url : '/product/search',
				data:{ 'search': $(this).val() },
				success: function (data) {
					$('.ajax-search').empty();
					console.log(data);
					$.each(data.products, function (products) {
						$('.ajax-search').append('<h4>'+products.id+'</h4>');
					});
				}
			});
		});
	</script> --}}
	{{-- <script>
		function loadAjax(){
			$.ajax({
	            url: "/product/content",
	            type: 'get',
	            //data: {prdname: keyword},    
	            success: function(response){
					console.log(response); 
	              		$('.ajax-search').html(response); 
	                   
	              }
          	});	
		}
	</script> --}}
	<script>
		$('.sb-text').on('keyup',function(){
			var keyword = $(this).parent().find('.sb-text').val();
			// if(keyword==""){
			// 	window.location=admin_url + 'product';
			// }
			$.ajax({
		            url: "/product/search",
		            type: 'get',
		            data: {prdname: keyword},  
					beforeSend: function() {
						$("#loading-image").show();
						
					},  
		            success: function(response){
						$('.ajax-search').empty(); 
	              		$('.ajax-search').html(response); 
	                	$("#loading-image").hide();   
		              }
	          	});
		});
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
@endsection