@extends('backend.master.master')
@section('title','Danh sách bình luận')
@section('content')
@section('comment','active')
@section('unActiveComment','active')
     <!--main-->
     <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Quản lý bình luận</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình luận</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="panel panel-default">
            <div class="panel-heading">Bình luận cần phê duyệt</div>
            
            <div class="panel-body">
                    <a href="/admin/comment/active" class="btn btn-primary">Bình luận đã phê duyệt</a>
                <div class="bootstrap-table" style="margin-top: 20px;">
                    <div class="fixed-table-toolbar"></div>
                    <div class="fixed-table-container">
                        <div class="fixed-table-header">
                            @if (session('thongbao'))
                                <div class="alert bg-success thongbao" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg>{{session('thongbao')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
                                </div>
                            @endif
                            @if (session('thongbao2'))
                                <div class="alert bg-danger thongbao" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg>{{session('thongbao2')}}<i class="pull-right"><span class="glyphicon glyphicon-remove btn-remove"></span></i>
                                </div>
                            @endif
                        </div>
                        <div class="fixed-table-body">
                            <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
                            <table data-toggle="table" data-url="tables/data2.json" class="table table-hover" id="comment-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Tuỳ chỉnh</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <form action="/admin/comment/delmulti" method="post">
                                    @csrf
                                <input onclick="return delete_comment()" type="submit" class="btn btn-danger" value="Xóa" style="float:right">   
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                        <td>{{$i++}}</td>
                                            <td>
                                                <div class="Popovers-product" href="#">{{$comment->product->name}}
                                                    <div class="Popovers-info">
                                                        <div class="panel panel-info product-info">
                                                            <div class="panel-heading" align='center'>
                                                                Thông tin
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img width="100%" src="/backend/img/{{$comment->product->img}}" class="thumbnail">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <p><strong>Mã sản phẩm : {{$comment->product->code}}</strong></p>
                                                                        <p>Tên sản phẩm :{{$comment->product->name}}
                                                                            </p>
                                                                        <p>Danh mục:{{$comment->product->category->name}}</p>
                                                                        <p>
                                                                            @foreach (attr_values($comment->product->values) as $key => $value)
                                                                                {{$key}}: 
                                                                                @foreach ($value as $item)
                                                                                    {{$item}},
                                                                                @endforeach<br>
                                                                            @endforeach
                                                                            {{-- size:xl,xxl --}}
                                                                        </p>
                                                                    </div>
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </td>
                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->email}}</td>
                                            <td>{{$comment->content}}</td>
                                            <td width="26%">
                                                <a onclick="return confirm_comment()" id="" class="btn btn-success" href="/admin/comment/confirm/{{$comment->id}}" role="button"><span class="glyphicon glyphicon-ok"
                                                        aria-hidden="true"></span> Xác nhận</a>
                                                <a name="" id="" class="btn btn-warning" href="/admin/comment/edit/{{$comment->id}}" role="button"><span
                                                        class="glyphicon glyphicon-edit" aria-hidden="true" style="padding-right: 5px;"></span>Sửa</a>
                                                <a id="" onclick="return delete_comment()" class="btn btn-danger" href="/admin/comment/delete/{{$comment->id}}" role="button"><span class="glyphicon glyphicon-remove"
                                                        aria-hidden="true" style="padding-right: 5px;"></span>Xoá</a>
    
                                            </td>
                                            <td><input type="checkbox" name="comment[]" id="" value="{{$comment->id}}"></td>
                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="Popovers-product" href="#">Áo Khoác Bomber Nỉ Xanh
                                                <div class="Popovers-info">
                                                    <div class="panel panel-info product-info">
                                                        <div class="panel-heading" align='center'>
                                                            Thông tin
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img width="100%" src="img/ao-khoac.jpg" class="thumbnail">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <p><strong>Mã sản phẩm : SP01</strong></p>
                                                                    <p>Tên sản phẩm :Áo Khoác Bomber Nỉ Xanh Lá Cây
                                                                        AK179</p>
                                                                    <p>Danh mục:Áo khoác nam</p>
                                                                    <p>size:xl,xxl</p>
                                                                    <div class="group-color">Màu tuỳ chọn:
                                                                        <div class="product-color" style="background-color: blueviolet;"></div>
                                                                        <div class="product-color" style="background-color: brown;"></div>
                                                                        <div class="product-color" style="background-color: darkorange;"></div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        <td>zimpro94</td>
                                        <td>Tôi muốn đặt sản phẩm này .... </td>
                                        <td>
                                            <a name="" id="" class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-ok"
                                                    aria-hidden="true"></span> Xác nhận</a>
                                            <a name="" id="" class="btn btn-warning" href="/admin/comment/edit" role="button"><span
                                                    class="glyphicon glyphicon-edit" aria-hidden="true" style="padding-right: 5px;"></span>Sửa</a>
                                            <a name="" id="" class="btn btn-danger" href="#" role="button"><span class="glyphicon glyphicon-remove"
                                                    aria-hidden="true" style="padding-right: 5px;"></span>Xoá</a>

                                        </td>
                                    </tr> --}}
                                    

                                </tbody>
                                
                                </form>
                            </table>
                            {{-- <div class="pull-right pagination">
                                <ul class="pagination">
                                     {{$comments->links()}}
                                </ul>
                            </div> --}}
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>




    </div>
    <!--end main-->
@endsection
@section('script')
    @parent
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
        function confirm_comment(){
            return confirm('Bạn có chắc muốn phê duyệt bình luận này ??');
        }
        function delete_comment(){
            return confirm('Bạn có chắc muốn xóa bình luận này ??');
        }
        $(document).ready( function () {
            $('#comment-table').DataTable();
        } );
    </script>
@endsection