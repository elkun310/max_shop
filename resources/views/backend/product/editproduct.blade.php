@extends('backend.master.master')
@section('title','Sửa sản phẩm')
@section('content')
@section('product','class=active')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="POST" enctype="multipart/form-data" id="editProductForm">
            @csrf
            <div class="panel panel-primary">
            <div class="panel-heading">Sửa sản phẩm {{$product->name}}</div>
                @if (session('thongbao'))
                    <div class="alert bg-success thongbao" role="alert">
                        <svg class="glyph stroked checkmark">
                            <use xlink:href="#stroked-checkmark"></use>
                        </svg>{{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
                    </div>
                @endif
            <div class="panel-body">
                <div class="row" style="margin-bottom:40px">
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category" class="form-control">
                                        {{getCategory($categories,0,'',$product->category_id)}}
                                    </select>
                                   
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" name="code" class="form-control" value="{{$product->code}}">
                                </div>
                                {{showError($errors,'code')}}
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                </div>
                                {{showError($errors,'name')}}
                                <div class="form-group">
                                <label>Giá sản phẩm (Giá chung)</label> 
                                    {{-- <a href="/admin/product/edit-variant/{{$product->id}}"><span class="glyphicon glyphicon-chevron-right"></span>
                                        Giá theo biến thể</a> --}}
                                    <input required type="number" name="price" class="form-control"
                                        value="{{$product->price}}">
                                </div>
                                {{showError($errors,'price')}}
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <select required name="featured" class="form-control">
                                        <option 
                                        @if ($product->featured==0)
                                            selected
                                        @endif value="0" >Không</option>
                                        <option 
                                        @if ($product->featured==1)
                                            selected
                                        @endif value="1">
                                        Có</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select required name="state" class="form-control">
                                        <option  
                                            @if ($product->state==1)
                                                selected
                                            @endif value="1">   
                                        Còn hàng</option>
                                        <option 
                                        @if ($product->state==0)
                                            selected
                                        @endif value="0">
                                        Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select required name="display" class="form-control">
                                        <option
                                            @if ($product->display==1)
                                                selected
                                            @endif value="1">   
                                        Hiện sản phẩm</option>
                                        <option 
                                            @if ($product->display==0)
                                                selected
                                            @endif value="0"> 
                                        Ẩn sản phẩm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="img" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/{{$product->img}}">
                                </div>
                                {{showError($errors,'img')}}
                            </div> 
                        </div>
                        <div class="form-group">
                            <label>Thông tin</label>
                            <textarea required name="info" style="width: 100%;height: 100px;">{{$product->info}}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="panel panel-default">
                            {{-- <div class="panel-body tabs">
                                <label>Các thuộc Tính</label>
                                <ul class="nav nav-tabs">
                                    <li class='active'><a href="#tab17" data-toggle="tab">size</a></li>
                                    <li><a href="#tab18" data-toggle="tab">Màu sắc</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade  active  in" id="tab17">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S</th>
                                                    <th>M</th>
                                                    <th>L</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[17][60]"
                                                            value="60"> </td>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[17][61]"
                                                            value="61" checked> </td>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[17][64]"
                                                            value="64" checked> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>

                                    <div class="tab-pane fade  in" id="tab18">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Đỏ</th>
                                                    <th>đen</th>
                                                    <th>xám</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[18][62]"
                                                            value="62"> </td>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[18][63]"
                                                            value="63" checked> </td>
                                                    <td> <input class="form-check-input" type="checkbox" name="attr[18][65]"
                                                            value="65"> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="panel-body tabs">
                                
                                {{showError($errors,'attr_name')}}
                                {{showError($errors,'value_name')}}
                                <ul class="nav nav-tabs">
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($attrs as $attr)
                                        <li @if ($i==0) class='active' @endif><a href="#tab{{$attr->id}}" data-toggle="tab">{{$attr->name}}</a></li>
                                        @php
                                            $i=1;
                                        @endphp    
                                    @endforeach
                        
                                </ul>
                                <div class="tab-content">
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($attrs as $attr)
                                    <div class="tab-pane fade  @if ($i==0)active @endif  in" id="tab{{$attr->id}}">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        @foreach ($attr->values as $value)
                                                            <th>{{$value->value}}</th>
                                                        @endforeach
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach ($attr->values as $value)
                                                            <td>
                                                                <input class="form-check-input" @if(check_value($product,$value->id)) checked  @endif type="checkbox" name="attr[{{$attr->id}}][]"
                                                            value="{{$value->id}}">
                                                            </td>
                                                        @endforeach
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            
                                        </div>
                                        @php
                                            $i=1;
                                        @endphp    
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <p></p>
                                </label>
                            </div>
                        </div>

                    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea id="editor" required name="describe" style="width: 100%;height: 100px;">
                                        {{$product->describe}}
                                </textarea>

                            </div>
                            <button class="btn btn-success btn-submit" name="add-product" type="submit">Sửa sản phẩm</button>
                            <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                        </div>
                    </div>
                </div>
                </div>
                <div class="clearfix"></div>
            </form>
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
    <!--toastr-->
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
    $("#editProductForm").submit(function (e) {
        //disable the submit button
        $(".btn-submit").attr("disabled", true);
        return true;
    });
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $('#avatar').click(function () {
            $('#img').click();
        });
    });

</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'info' );
    CKEDITOR.replace( 'describe' );
</script>
@endsection
