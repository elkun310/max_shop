@extends('backend.master.master')
@section('title','Danh sách đơn hàng đã xử lý')
@section('content')
@section('order','active')
@section('orderProcessed','active')

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
					<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if (session('thongbao'))
									<div class="alert bg-success thongbao" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
									</div>
								@endif
								<a href="/admin/order" class="btn btn-warning"><span class="glyphicon glyphicon-gift" style="padding-right: 10px;"></span>Đơn Chưa xử lý</a>
								<button class="btn btn-info btn-export"><span class="fa fa-download" style="padding-right: 10px;"></span>Xuất ra</button>
								<ul class="dt-button-collection dropdown-menu" role="menu" style="top: 114px;left: 182px;">
									<li class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table-leads"><a href="/admin/order/export-excel"><i class="fa fa-file-excel-o" aria-hidden="true" style="padding-right: 10px;"></i>Excel</a></li>
									<li class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="table-leads"><a href="/admin/order/export-excel"><i class="fa fa-file-excel-o" aria-hidden="true" style="padding-right: 10px;"></i>CSV</a></li>
									<li class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="table-leads"><a href="/admin/order/export-pdf"><i class="fa fa-file-pdf-o" aria-hidden="true" style="padding-right: 10px;"></i>PDF</a></li>
								</ul>
								
								
								{{-- <a href="/admin/order/export-excel" style="float:right" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true" style="padding-right: 10px;"></i>Xuất excel</a>
								<a href="/admin/order/export-pdf" style="float:right;margin-right: 15px;border-radius: 5px;" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true" style="padding-right: 10px;"></i>Xuất PDF</a> --}}
								
								<!--sortOrderByDate-->
								<form action="/admin/order/sortprocessed" method="get" accept-charset="utf-8" style="margin-top:20px;">
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
											<button type="submit" class="btn btn-info label-margin">Xuất ra</button>
										</div>
									</div>
								</form>
								<!--sortOrderByDate-->
								<table class="table table-bordered" style="margin-top:20px;">				
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
											<th>Thời gian xử lý</th>
											<th>Nhân viên xử lý</th>
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
												<td>{{$customer->id}}</td>
												<td>{{$customer->full_name}}</td>
												<td>{{$customer->email}}</td>
												<td>{{$customer->phone}}</td>
												<td>{{$customer->address}}</td>
												<td>{{Carbon\Carbon::parse($customer->updated_at)->format('d-m-Y H:m:s')}}</td>
												<td>{{$customer->staff}}</td>
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
							{{-- {{$customers->links()}} --}}
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
@section('script')
	@parent
	<script>
		$(document).ready(function(){
			$('.btn-export').click(function(){
				// $(this).parent().find('.dropdown-menu').toggleClass('export-show');
				$(this).parent().find('.dropdown-menu').toggle('export-show');
			})
		});
	</script>
@endsection