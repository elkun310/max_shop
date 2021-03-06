@extends('backend.master.master')
@section('title','Sửa tên thuộc tính')
@section('content')
@section('product','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active"><a href="/admin/product/detail-attr">Danh mục</a>/<a href="/admin/product/detail-attr">Thuộc tính</a>/Sửa thuộc tính</li>
		</ol>
	</div>
	<!--/.row-->


	<!--/.row-->
	<div class="row col-md-offset-3 ">
		<div class="col-md-6">	
		<div class="panel panel-blue">
			<div class="panel-heading dark-overlay">Sửa thuộc tính</div>
			<div class="panel-body">
				<form action="" method="post">
					@csrf
					
					<div class="form-group">
					<label for="">Tên Thuộc tính</label>
					<input type="text" name="attr_name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('attr_name',$attr->name)}}">
					</div>
					{{showError($errors,'attr_name')}}
					<div  align="right"><button class="btn btn-success" type="submit">Sửa</button></div>
				</form>
			</div>
		</div>
						
						
						
			
		</div>
		<!--/.col-->
	</div>
	<!--/.row-->
</div>
<!--/.main-->
@endsection