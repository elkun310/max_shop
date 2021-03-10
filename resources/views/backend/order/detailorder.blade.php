@extends('backend.master.master')
@section('title','Chi tiết đơn hàng')
@section('content')
@section('order','class=active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{$customer->full_name}}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: {{$customer->phone}}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{$customer->address}}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th>Thông tin Sản phẩm</th>
											<th>Số lượng</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
										@foreach ($customer->order as $order)
											<tr>
												<td>{{$i++}}</td>
												<td>
													<div class="row">
														<div class="col-md-4">
															<img width="100px" src="/backend/img/{{$order->img}}" class="thumbnail">
														</div>
														<div class="col-md-8">
															{{-- <p>Mã sản phẩm: {{$order->name}}</p> --}}
															<p>Tên Sản phẩm: <strong>{{$order->name}}</strong></p>
															@foreach ($order->attr as $attr)
																{{-- <div class="group-color">{{$attr->name}}:
																	<div class="product-color" style="background-color: brown;"></div>
																</div> --}}
																
																<p>{{$attr->name}}:{{$attr->value}}</p>
															@endforeach
															
														</div>
													</div>
												</td>
												<td>{{$order->quantity}}</td>
												<td>{{number_format($order->price),0,"",","}} VNĐ</td>
												<td>{{number_format($order->price*$order->quantity),0,"",","}} VNĐ</td>
	
											</tr>
										@endforeach
										
										

									</tbody>

								</table>
								<table class="table">
									<thead>
										<tr>
											<th width='70%'>
												<h4 align='right'>Tổng Tiền :</h4>
											</th>
											<th>
												<h4 align='right' style="color: brown;">{{number_format($customer->total,0,"",",")}} VNĐ</h4>
											</th>

										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								<!-- Modal cancel order -->
								<div class="modal fade" id="delOrderModal" role="dialog">
									<div class="modal-dialog">
									
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Mời bạn nhập lý do hủy</h4>
										</div>
										<div class="modal-body">
										<form action="/admin/order/delete/{{$customer->id}}" method="GET" id="cancelOrderForm">
											<div class="form-group">
												<label for="reason">Lý do hủy :</label>
												<input type="reason" placeholder="Bắt buộc phải nhập " class="form-control" name="reason" required>		
											</div>
											{{-- <input type="hidden" name="name-cancelor" value="{{Auth::user()->full}}"> --}}
											<button type="submit" class="btn btn-danger btn-submit">Xác nhận hủy</button>
										</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>
									
									</div>
								</div>
								<div class="alert alert-primary" role="alert" align='right'>
									<a  class="btn btn-warning" href="/admin/order/print/{{$customer->id}}" role="button"><i class="fa fa-print" aria-hidden="true" style="padding-right: 5px;"></i>In hóa đơn</a>
									<a onclick="return process()" class="btn btn-success" href="/admin/order/processing/{{$customer->id}}" role="button"><i class="fa fa-check" aria-hidden="true" style="padding-right: 5px;"></i>Đã xử lý</a>
									<a class="btn btn-danger" data-toggle="modal" data-target="#delOrderModal"><i class="fa fa-trash" aria-hidden="true" style="padding-right: 10px"></i>Hủy đơn hàng</a>
								</div>

							</div>
						</div>
						<div class="clearfix"></div>
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
		$("#cancelOrderForm").submit(function (e) {
            //disable the submit button
            $(".btn-submit").attr("disabled", true);
            return true;

        });

		function process(){
			return confirm('Đơn hàng sau khi xử lý sẽ được tính vào phần doanh thu bán hàng ?');
		}
	</script>
@endsection