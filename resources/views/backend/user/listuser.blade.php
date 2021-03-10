@extends('backend.master.master')
@section('title','Danh sách thành viên')
@section('content')
@section('user','class=active')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="row options" >
							<div class="col-md-3">
									<a href="/admin/user/add" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true" style="padding-right: 5px"></i>Thêm Thành viên</a>
							</div>
						</div>
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table id="mytable" class="table table-bordred table-striped">
									<thead>
										{{-- <th><input type="checkbox" id="checkall" /></th> --}}
										<th>Id</th>
										<th>Họ và tên đầy đủ</th>
										<th>Email cá nhân</th>
										<th>Địa chỉ liên hệ</th>
										<th>Số điện thoại</th>
										<th>Quyền</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</thead>
									<tbody>
										@foreach ($users as $row)
											<tr>
												<!--<td><input type="checkbox" class="checkthis" /></td>-->
												<td>{{$row->id}}</td>
												<td><img src="/backend/img/user-placeholder.jpg" class="staff-profile-image-small">{{$row->full}}</td>
												<td>{{$row->email}}</td>
												<td>{{$row->address}}</td>
												<td>{{$row->phone}}</td>
												<td>
													@if ($row->level==1)
														{{"Admin"}}
													@elseif($row->level==2)
														{{"User"}}
													@endif
												</td>
												<td><a href="/admin/user/edit/{{$row->id}}"><p data-placement="top" data-toggle="tooltip" title="Chỉnh sửa"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
												<td><a href="/admin/user/del-user/{{$row->id}}" onclick="return del('{{$row->full}}')"><p data-placement="top" data-toggle="tooltip" title="Xóa"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
								</div>
								<div align='right'>
									{{$users->links()}}
								</div>
							
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!--/.row-->
		
			<!--end main-->


@endsection
@section('script')
	@parent
	<link href="css/toastr.min.css" rel="stylesheet">
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
		function del(name){
			return confirm('Bạn có chắc chắn muốn xóa thành viên '+'""' +name+'""'+' không ?');
		}
	</script>
	{{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#user-table').DataTable();
        } );
    </script> --}}
@endsection