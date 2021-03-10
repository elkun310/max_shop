@extends('backend.master.master')
@section('title','Danh sách khách hàng')
@section('content')
@section('customer','class=active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách khách hàng</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách khách hàng</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="row options" >
						</div>
							
						
								{{-- @if (session('thongbao'))
									<div class="alert bg-success thongbao" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
									</div>
								@endif --}}
								
							<div class="bootstrap-table">
								<div class="table-responsive">
									<table id="mytable" class="table table-bordred table-striped">
									<thead>
										<tr class="bg-primary">
											<th>#</th>
											<th>Tên khách hàng</th>
											<th>Email liên hệ</th>
											<th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
											<th>Sửa</th>
											<th>Xóa</th>
										</tr>
									</thead>
									
									<tbody>
                                       @foreach ($users as $row)
										<tr>
											<td>
												{{$row->id}}
												
											</td>
                                            <td width='20%'>
                                                    <img src="/backend/img/customer-icon.png" class="staff-profile-image-small">
                                                {{$row->full}}
                                            </td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->phone}}</td>
											<td><a href="/admin/user/edit/{{$row->id}}"><p data-placement="top" data-toggle="tooltip" title="Chỉnh sửa"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
											<td><a href="/admin/user/del-user/{{$row->id}}" onclick="return del('{{$row->full}}')"><p data-placement="top" data-toggle="tooltip" title="Xóa"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
										</tr>
									   @endforeach
								
									</tbody>
								</table>
								<div align='right'>
									{{$users->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@endsection
@section('script')
	@parent
	{{-- js for toastr --}}
	<link href="css/toastr.min.css" rel="stylesheet">
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<script>
			// @if(Session::has('message'))
			// 	var type="{{Session::get('alert-type','info')}}"
			// 	switch(type){
			// 		case 'info':
			// 			 toastr.info("{{ Session::get('message') }}");
			// 			 break;
			// 		case 'success':
			// 			toastr.success("{{ Session::get('message') }}");
			// 			break;
			// 		 case 'warning':
			// 			toastr.warning("{{ Session::get('message') }}");
			// 			break;
			// 		case 'error':
			// 			toastr.error("{{ Session::get('message') }}");
			// 			break;
			// 	}
			// @endif
	</script>
	<script>
		// function del(name){
		// 	return confirm('Bạn có chắc chắn muốn xóa thành viên '+'""' +name+'""'+' không ?');
		// }
	</script>
	{{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#user-table').DataTable();
        } );
    </script> --}}
@endsection