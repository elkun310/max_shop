@extends('backend.master.master')
@section('title','Sửa giá trị thuộc tính')
@section('content')
@section('product','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục/Thuộc tính/Sửa giá trị của tính</li>
		</ol>
	</div>
	<!--/.row-->


	<!--/.row-->
	<div class="row col-md-offset-3 ">
		<div class="col-md-6">	
		<div class="panel panel-blue">
			<div class="panel-heading dark-overlay">Sửa giá trị của thuộc tính</div>
			<div class="panel-body">
				<form action="" method="post">
					@csrf
					<div class="form-group">
					<label for="">Giá trị của thuộc tính " {{$value->attribute->name}} "</label>
					<input type="text" name="value_attr" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('value_attr',$value->value)}}">
					</div>
					{{showError($errors,'value_attr')}}
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