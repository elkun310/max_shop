@extends('backend.master.master')
@section('title','Danh sách đơn hàng đã hủy')
@section('content')
@section('order','active')
@section('orderCancel','active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	{{-- <div class="main"> --}}
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
					<div class="panel-heading">Danh sách đơn đặt hàng đã hủy</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
                                    <a href="/admin/order" class="btn btn-warning">Đơn đã chưa xử lý</a>
                                    <a href="/admin/order/processed" class="btn btn-success">Đơn đã xử lý</a>
                                @if (session('thongbao'))
									<div class="alert bg-success thongbao" style="margin-top: 20px;" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{session('thongbao')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
									</div>
								@endif   
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Tên khách hàng</th>
											<th>Số điện thoại</th>
											<th>Địa chỉ</th>
                                            <th>Lý do hủy</th>    
											<th>Thời gian hủy</th>
											<th>Nhân viên xử lý</th>
										</tr>
									</thead>
									<tbody>
										@if ($count<=0)
											<tr class="odd">
												<td valign="top" colspan="12" class="dataTables_empty">Không có dữ liệu</td>
											</tr>
										@endif
										@foreach ($customers as $row)
											<tr>
												<td>{{$row->id}}</td>
												<td>{{$row->full_name}}</td>
												<td>{{$row->phone}}</td>
                                                <td width="25%">{{$row->address}}</td>
												<td>{{$row->reason}}</td>
												<td>{{Carbon\Carbon::parse($row->updated_at)->format('d-m-Y H-m-s')}}</td>
												{{-- <td>
												<a href="/admin/order/detail/{{$row->id}}" class="btn btn-warning"><i class="fa fa-pencil" style="padding-right:10px" aria-hidden="true"></i>Xử lý</a>
												</td> --}}
												<td>{{$row->staff}}</td>
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
						<div align="right">{{$customers->links()}}</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->

@endsection