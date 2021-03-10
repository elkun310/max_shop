@extends('backend.master.master')
@section('title','Sửa biến thể')
@section('content')
@section('product','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="/admin"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Biến thể</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Biến thể</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="col-md-12">
        <div class="panel panel-default">
        <form action="" method="post">
            @csrf
                <div class="panel-heading" align='center'>
                    Giá cho từng biến thể sản phẩm : {{$product->name}} ({{$product->code}})
                    @if (session('thongbao'))
                    <div class="alert bg-success thongbao" role="alert">
                        <svg class="glyph stroked checkmark">
                            <use xlink:href="#stroked-checkmark"></use>
                        </svg>{{session('thongbao')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
                    </div>
                @endif
                </div>
                
                <div class="panel-body" align='center'>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width=''>Biến thể</th>
                                <th width=''>Giá (có thể trống)</th>
                                <th width=''>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variant as $variant)
                            <tr>
                                <td scope="row">
                                    @foreach ($variant->values as $value)
                                        {{$value->attribute->name}}:{{$value->value}},
                                    @endforeach
                                   
                                </td>
                                <td>
                                    
                                <input name="variant[{{$variant->id}}]" class="form-control" placeholder="Giá cho biến thể" value="{{$variant->price}}">
                                    
                                </td>
                                <td>
                                    <a class="btn btn-warning" onclick="return del()" href="/admin/product/del-variant/{{$variant->id}}" role="button">Xoá</a>
                                </td>
                                </tr>    
                            @endforeach
                            
                            
                        </tbody>
                    </table>

                </div>
                <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a class="btn btn-warning"
                        href="/admin/product/" role="button">Bỏ qua</a></div>
            </form>
        </div>
    </div>





</div>
<!--/.main-->
@endsection
@section('script')
	@parent
	<script>
			function del(){
				return confirm('Bạn có chắc chắn muốn xóa biến thể ?');
			}
	</script>
@endsection