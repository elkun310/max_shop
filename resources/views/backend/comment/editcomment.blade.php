@extends('backend.master.master')
@section('title','Chỉnh sửa bình luận')
@section('content')
@section('comment','class=active')
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
            <form action="" method="POST">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">Sửa bình luận</div>
                    <div class="panel-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                {{$comment->name}}
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" rows="3" name="content">{{$comment->content}}        
                                </textarea>
                            </div>
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <button class="btn btn-success" role="button" type="submit">Sửa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end main-->
@endsection