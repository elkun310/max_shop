@extends('backend.master.master')
@section('title','Danh sách đơn hàng chưa xử lý')
@section('content')
@section('order','active')
@section('unOrder','active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								
								<a href="/admin/order/processed" class="btn btn-success">Đơn đã xử lý</a>
								<a href="/admin/order/cancel" class="btn btn-danger">Đơn đã huỷ</a>
								<!--sortOrderByDate-->
								<form action="/admin/order/sortdate" method="get" accept-charset="utf-8" style="margin-top:20px;" id="sortFormByDate">
									{{-- @csrf --}}
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="order_from_date" class="control-label">Từ ngày</label>
												<div class="input-group date">
													<input type="date" name="order_from_date" class="form-control datepicker" autocomplete="off" style="" value="<?php if(isset($_GET['order_from_date'])){echo $_GET['order_from_date'];}?>">
													<div class="input-group-addon" style="">
														<i class="fa fa-calendar calendar-icon"></i>
													</div>
												</div>
											</div> 
											{{showError($errors,'order_from_date')}}                       
										</div>
										<div class="col-md-4">
											<div class="form-group"><label for="order_to_date" class="control-label">Đến ngày</label>
												<div class="input-group date">
													<input type="date" name="order_to_date" class="form-control datepicker" autocomplete="off" style="" value="<?php if(isset($_GET['order_to_date'])){echo $_GET['order_to_date'];}?>">
													<div class="input-group-addon">
														<i class="fa fa-calendar calendar-icon"></i>
													</div>
												</div>
											</div>
											{{showError($errors,'order_to_date')}}  
										</div>
										<div class="col-md-4 text-left" style="margin-top: 25px;">
											<button type="submit" class="btn btn-info label-margin btn-sort">Xuất ra</button>
										</div>
									</div>
								</form>
								<!--sortOrderByDate-->
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Số điện thoại</th>
											<th>Địa chỉ</th>
											<th>Thời gian</th>
											<th>Xử lý</th>
										</tr>
									</thead>
									<tbody>
										@if ($count<=0)
											<tr class="odd">
												<td valign="top" colspan="12" class="dataTables_empty">Không có dữ liệu</td>
											</tr>
										@endif
										@foreach ($customers as $customer)
											<tr>
												<td>#{{$customer->id}}</td>
												<td>{{$customer->full_name}}</td>
												<td>{{$customer->phone}}</td>
												<td>{{$customer->address}}</td>
												<td>{{Carbon\Carbon::parse($customer->created_at)->format('d-m-Y H:m:s')}}</td>
												<td>
													<a href="/admin/order/detail/{{$customer->id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true" style="padding-right: 5px;"></i>Xử lý</a>
	
												</td>
											</tr>
										@endforeach
										

									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="dataTables_info" id="table-leads_info" role="status" aria-live="polite">
									@if ($count<6)
										Xem từ 1 đến {{$count}} của {{$count}} mục
									@elseif($count>=6)
										Xem từ 1 đến 6 của {{$count}} các mục
									@endif
								</div>
							</div>
						</div>
						<div align="right">
							@if (isset($_GET))
							{{$customers->appends($_GET)->links()}}
							@else
							{{$customers->links()}}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection