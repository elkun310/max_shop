@extends('backend.master.master')
@section('title','Sửa danh mục')
@section('content')
@section('category','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="/admin"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Icons</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5">
						<form  method="POST">
							@csrf
							<div class="form-group">
								<label for="">Danh mục cha:</label>
								<select class="form-control" name="idParent" id="">
									<option>----ROOT----</option>
									{{-- <option>Nam</option>
									<option>---|Áo khoác nam</option>
									<option>---|---|Áo khoác nam</option>
									<option selected>Nữ</option>
									<option>---|Áo khoác nữ</option> --}}
									{{GetCategory($categories,0,"",$category->parent)}}
								</select>
							</div>
							<div class="form-group">
								<label for="">Tên Danh mục</label>
							<input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới" value="{{$category->name}}">
								{{showError($errors,'name')}}
							</div>
							@if (session('error'))
								<div class="alert bg-danger thongbao" role="alert">
									<svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> {{session('error')}}<i class="pull-right" style="cursor:pointer"><span
											class="glyphicon glyphicon-remove btn-remove"></span></i>
								</div>
							@endif
							<button type="submit" class="btn btn-primary">Sửa danh mục</button>
						</form>
						</div>
						<div class="col-md-7">
							@if (session('thongbao'))
                                <div class="alert bg-success thongbao" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg> {{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span
                                            class="glyphicon glyphicon-remove btn-remove"></span></i>
                                </div>
                            @endif
							<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
							<div class="vertical-menu">
								<div class="item-menu active">Danh mục </div>
								{{showCategory($categories,0,'')}}
							</div>
						</div>
					</div>
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
		function del(name)
		{
			return confirm('Bạn có chắc muốn xóa danh mục '+'"'+name+'"'+"?");
		}
	</script>
@endsection