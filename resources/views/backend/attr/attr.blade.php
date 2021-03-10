@extends('backend.master.master')
@section('title','Quản lý thuộc tính')
@section('content')
@section('product','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active"><a href="/admin/product/detail-attr">Danh mục</a></li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý thuộc tính</h1>

		</div>
	</div>
	<!--/.row-->
	@if (session('thongbao'))
		<div class="alert bg-success thongbao" role="alert">
			<svg class="glyph stroked checkmark">
				<use xlink:href="#stroked-checkmark"></use>
			</svg>{{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
		</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
						@foreach ($attributes as $row)
							<div class="row magrin-attr">
									<div class="col-md-2 panel-blue widget-left">
										<strong class="medium">{{$row->name}}</strong>
									<a class="delete-attr" onclick="return del('{{$row->name}}')" href="/admin/product/del-attr/{{$row->id}}"><i class="fas fa-times"></i></a>
									<a class="edit-attr" href="/admin/product/edit-attr/{{$row->id}}"><i class="fas fa-edit"></i></a>
									</div>
									<div class="col-md-10 widget-right boxattr">
										@foreach ($row->values as $item)
											<div class="text-attr">
												{{$item->value}}
											<a href="/admin/product/edit-value/{{$item->id}}" class="edit-value"><i class="fas fa-edit"></i></a>
											<a onclick="return del('{{$item->value}}')" href="/admin/product/del-value/{{$item->id}}" class="del-value"><i class="fas fa-times"></i></a>
											</div>
										@endforeach 
										<div class="text-attr"><a href="#" class="add-value"><i class="fas fa-plus-circle"></i></i></a></div>
										
									</div>		
							</div>
						@endforeach
						
				</div>
			</div>
		</div>
		<!--/.col-->
	</div>
	<!--/.row-->
</div>
<!--/.main-->
@endsection
@section('script')
	@parent
	<script>
		function del(name){
			return confirm('Bạn có thực sự muốn xóa thuộc tính '+'"'+name+'" không ?');
		}
	</script>
@endsection