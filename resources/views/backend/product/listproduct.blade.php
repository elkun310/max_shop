@extends('backend.master.master')
@section('title','Danh sách sản phẩm')
@section('content')
@section('product','class=active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="row">
								<div class="col-md-3">
										<a href="/admin/product/add" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true" style="padding-right: 5px"></i>Thêm sản phẩm</a>
								</div>
								<div class="container box1" style="width: 400px;margin-left: auto;float: right;">  
									<form action="/admin/product/search" method="get">
										<div class="form-group" style="display: flex">
											<input type="text" name="product_name" id="product_name" class="form-control text-search" placeholder="Nhập tên sản phẩm..."/>
											<button type="submit" value="" class="btn-search"><i class="fa fa-search"></i></button>
										</div>
										
									</form>	   
									
								</div>
						</div>
						
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if (session('thongbao'))
									<div class="alert bg-success thongbao" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{session('thongbao')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
									</div>
								@endif
								<table class="table table-bordered" style="">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Hiển thị</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($products as $row)
										<tr>
											<td>#{{$row->id}}</td>
											<td width="42%">
												<div class="row">
												<div class="col-md-3"><img src="img/{{$row->img}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
													<p><strong>Mã sản phẩm : {{$row->code}}</strong></p>
													<p>Tên sản phẩm :{!!$row->name!!}</p>
														{{-- <p>Danh mục:{{$row->category->name}}</p> --}}
														@foreach (attr_values($row->values) as $key=>$value)
															<p>{{$key}}:
																@foreach ($value as $item)
																	{{$item}},
																@endforeach</p>
														@endforeach
														{{-- <div class="group-color">Màu tuỳ chọn:
															<div class="product-color" style="background-color: #f11212;"></div>
															<div class="product-color" style="background-color: #03a9f4;"></div>
															<div class="product-color" style="background-color: #323030;"></div>
														</div> --}}

													</div>
												</div>
											</td>
											<td>{{number_format($row->price,0,"",",")}} VNĐ</td>
											<td>
												@if ($row->state==1)
												<a name="" id="" class="btn btn-success" href="#" role="button">
														{{"Còn hàng"}}
												</a>
												@elseif($row->state==0)
												<a name="" id="" class="btn btn-danger" href="#" role="button">
														{{"Hết hàng"}}
												</a>
												@endif		
											</td>
											<td>
												{{-- <input type="checkbox" id="switch" name="display" /><label for="switch">Toggle</label> --}}
												<label class="switch">
													<input type="checkbox" @if ($row->display==1) checked @endif name="display" value="1" class="chb-display" id="btn-chb-display" data-id={{$row->id}}>
													<span class="slider round"></span>
												</label>
											</td>
											<td width="9%">{{$row->category->name}}</td>
											<td width="15%">
											<button style="" data-id='{{$row->id}}' type="button" class="btn btn-primary btn-show" data-toggle="modal"  ><i class="fa fa-eye" aria-hidden="true"></i></button>
											<a href="/admin/product/edit/{{$row->id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											<a href="/admin/product/del-product/{{$row->id}}" onclick="return del('{{$row->id}}')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</td>
										</tr>
										@endforeach
										<div id="prdModal"  class="modal fade" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document" style="width: 800px;">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h3 class="modal-title">Thông tin chi tiết sản phẩm</h3>
													</div>
													<div class="modal-body">
														
														<!-- Trả dữ liệu từ view ajax về -->

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									</tbody>
								</table>
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="dataTables_info" id="table-leads_info" role="status" aria-live="polite">
									Xem từ 1 đến 5 của {{$total_product}} các mục
								</div>
							</div>
						</div>
						<div align='right'>
							{{$products->links()}}
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@endsection
<style>
	.switch {
	position: relative;
	display: inline-block;
	width: 40px;
	height: 22px;
	}

	.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
	}

	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 20px;
		width: 22px;
		left: 0px;
		bottom: 1px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(18px);
	-ms-transform: translateX(18px);
	transform: translateX(18px);
	}

	/* Rounded sliders */
	.slider.round {
	border-radius: 34px;
	}

	.slider.round:before {
	border-radius: 50%;
	}
</style>
@section('script')
	@parent
	<link href="css/toastr.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<!--ajax search-->
	<script>
		// $(document).ready(function(){
		// 	$('#product_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
		// 		var query = $(this).val(); //lấy gía trị ng dùng gõ
		// 		if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
		// 		{
		// 		var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
		// 		$.ajax({
		// 			url:"/admin/product/search", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
		// 			method:"POST", // phương thức gửi dữ liệu.
		// 			data:{query:query, _token:_token},
		// 			success:function(data){ //dữ liệu nhận về
		// 				$('#result').show();
		// 				// $('#countryList').fadeIn();  
		// 				// $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
		// 			}
		// 		});
		// 	};
		// });
		// });
		// $(document).on('click', 'li', function(){  
		// 	$('#country_name').val($(this).text());  
		// 	$('#countryList').fadeOut();  
		// }); 
	</script>
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
		//xem sản phẩm 
		$('.btn-show').click(function(){
			var prdid = $(this).attr('data-id');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
	            url: "/admin/product/ajax-show-product",
	            type: 'post',
	            data: {prdid: prdid},    
	            success: function(response){ 
	            // Add response in Modal body
	              		$('.modal-body').html(response); 
	                  // Display Modal
	                  $('#prdModal').modal('show'); 
	              }
          	});
		});
		//thay đổi trạng thái hiển thị sản phẩm
		$('.chb-display').change(function(){
			var product_id = $(this).attr('data-id');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
	            url: "/admin/product/ajax-display",
	            type: 'post',
	            data: {prdid: product_id},    
	            success: function(response){ 
					//toastr.success(response.message, response.alert-type);
					var type = response.type;
					// alert(type);
					switch(type){
						case 'info':
							toastr.info(response.message);
							break;
						case 'success':
							toastr.success(response.message);
							break;
						case 'warning':
							toastr.warning(response.message);
							break;
						case 'error':
							toastr.error(response.message);
							break;
					}
			}
          });

		});		
	</script>
	<script>
			function del(name){
				return confirm('Bạn có chắc chắn muốn xóa sản phẩm '+'"'+name+'"'+'?');
			}
	</script>

@endsection