@extends('backend.master.master')
@section('title','Thêm sản phẩm')
@section('content')
@section('product','class=active')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
            <form action="" method="post" enctype="multipart/form-data" id="addProductForm">
                @csrf
                <div class="panel panel-primary">
                    <form action="" method="get"></form>
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                {{-- <option value='1' selected>Nam</option>
                                                <option value='3'>---|Áo khoác nam</option>
                                                <option value='2'>Nữ</option>
                                                <option value='4'>---|Áo khoác nữ</option> --}}
                                                {{getCategory($categories,0,"",0)}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="code" class="form-control" value="{{old('code')}}">
                                        </div>
                                        {{showError($errors,'code')}}
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                        </div>
                                        {{showError($errors,'name')}}
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" class="form-control" value="{{old('price')}}">
                                        </div>
                                        {{showError($errors,'price')}}
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select name="featured" class="form-control">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select required name="state" class="form-control">
                                                <option value="1">Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Hiển thị</label>
                                            <select required name="display" class="form-control">
                                                <option value="1">Hiện sản phẩm</option>
                                                <option value="0">Ẩn sản phẩm</option>
                                            </select>
                                        </div>
                                        {{-- <input type="radio" name="display" id="" value="1">Hiện
                                        <input type="radio" name="display" id="" value="0">Ẩn --}}
                                        {{-- <div class="">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon beautiful">
                                                                <input type="radio" name="display" value="1">
                                                            </span>
                                                            <input type="text" class="form-control" value="Hiện sản phẩm">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon beautiful">
                                                                <input type="radio" name="display" value="0">
                                                            </span>
                                                            <input type="text" class="form-control" value="Ẩn sản phẩm">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div> --}}
                                    </div>
                                    <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="img" class="form-control hidden"
                                                    onchange="changeImg(this)" value="{{old('img')}}">
                                                <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">  
                                            </div>  
                                            {{showError($errors,'img')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea required name="info" style="width: 100%;height: 100px;">{{old('info')}}</textarea>
                                    {{-- {{{ Input::old('info') }}} --}}
                                </div>

                            </div>
                            <div class="col-xs-4">

                                <div class="panel panel-default">
                                    <div class="panel-body tabs">
                                        <label>Các thuộc Tính <a href="/admin/product/detail-attr"><span class="glyphicon glyphicon-cog"></span>
                                                Tùy chọn</a></label>
                                        @if (session('thongbao'))
                                            <div class="alert bg-success thongbao" role="alert">
                                                <svg class="glyph stroked checkmark">
                                                    <use xlink:href="#stroked-checkmark"></use>
                                                </svg>{{session('thongbao')}}<i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
                                            </div>
								        @endif
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
                                    


                                            <li><a href="#tab-add" data-toggle="tab">+</a></li>
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
                                                                        <input class="form-check-input" type="checkbox" name="attr[{{$attr->id}}][]"
                                                                    value="{{$value->id}}">
                                                                    </td>
                                                                @endforeach
                                                               
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <div class="form-group">
                                                        <form action="/admin/product/add-value" method="post">
                                                            @csrf
                                                            <label for="">Thêm giá trị cho thuộc tính</label>
                                                            <input type="hidden" name="attr_id" value="{{$attr->id}}">
                                                            <input name="value_name" type="text" class="form-control"
                                                                aria-describedby="helpId" placeholder="">
                                                            
                                                            <div><button name="add_val" type="submit" style="margin-top: 10px;border-radius: 6px;padding: 5px 15px;">Thêm</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                                @php
                                                    $i=1;
                                                @endphp    
                                            @endforeach
                                           
                                           

                                            <div class="tab-pane fade" id="tab-add">
                                                <form action="/admin/product/add-attr" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Tên thuộc tính mới</label>
                                                        <input type="text" class="form-control" name="attr_name"
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                   
                                                    <button type="submit" name="add_pro" class="btn btn-success"> <span
                                                            class="glyphicon glyphicon-plus"></span>
                                                        Thêm thuộc tính</button>
                                                </form>
                                            </div>
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
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" required name="describe" style="width: 100%;height: 100px;">{{old('describe')}}</textarea>
                                    </div>
                                    <button class="btn btn-success btn-submit" style="" name="add-product" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <!--/.row-->
    </div>
    
    <!--end main-->
@endsection
@section('script')
@parent
{{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">;

<style>
.input-group-addon.beautiful input[type="checkbox"],
.input-group-addon.beautiful input[type="radio"] {
    display: none;
}</style> --}}
<script>
    $("#addProductForm").submit(function (e) {
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
{{-- <script>
    $(function () {
    $('.input-group-addon.beautiful').each(function () {
        
        var $widget = $(this),
            $input = $widget.find('input'),
            type = $input.attr('type');
            settings = {
                checkbox: {
                    on: { icon: 'fa fa-check-circle-o' },
                    off: { icon: 'fa fa-circle-o' }
                },
                radio: {
                    on: { icon: 'fa fa-dot-circle-o' },
                    off: { icon: 'fa fa-circle-o' }
                }
            };
            
        $widget.prepend('<span class="' + settings[type].off.icon + '"></span>');
            
        $widget.on('click', function () {
            $input.prop('checked', !$input.is(':checked'));
            updateDisplay();
        });
            
        function updateDisplay() {
            var isChecked = $input.is(':checked') ? 'on' : 'off';
                
            $widget.find('.fa').attr('class', settings[type][isChecked].icon);
                
            //Just for desplay
            isChecked = $input.is(':checked') ? 'checked' : 'not Checked';
            // $widget.closest('.input-group').find('input[type="text"]').val('Input is currently ' + isChecked)
        }
        
        updateDisplay();
    });
});
</script> --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'info' );
    CKEDITOR.replace( 'describe' );
</script>
@endsection