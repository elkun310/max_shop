@extends('backend.master.master')
@section('title','Quản lý danh mục')
@section('content')
@section('category','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="/admin"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục</li>
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
						<form method="POST">
							@csrf
							<div class="form-group">
								<label for="">Danh mục cha:</label>
								<select class="form-control" name="idParent" id="">
									<option>----ROOT----</option>
									{{-- <option>Nam</option>
									<option>---|Áo khoác nam</option>
									<option>---|---|Áo khoác nam</option>
									<option>Nữ</option>
									<option>---|Áo khoác nữ</option> --}}
									{{getCategory($categories,0,"",0)}}
								</select>
							</div>
							<div class="form-group">
								<label for="">Tên Danh mục</label>
								<input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới">
								{{showError($errors,'name')}}
							</div>
							<button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true" style="padding-right: 5px"></i>Thêm danh mục</button>
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
        function del(name){
                return confirm('Bạn có muốn xóa vĩnh viễn danh mục '+'"'+name+'"'+'?');
            }
    </script>
@endsection