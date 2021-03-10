@extends('backend.master.master')
@section('title','Sửa thành viên')
@section('content')
@section('user','class=active')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form method="POST">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - {{$user->full}}</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">

                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">
                                    {{showError($errors,'email')}}
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    {{-- <input type="password" name="password" class="form-control" value=""> --}}
                                    <div class="input-group">
                                    <input type="password" class="form-control password" id="pass" name="password" autocomplete="off" aria-invalid="false">
                                            <span class="input-group-addon toggle-password"> 
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <span class="input-group-addon" onclick="generate();"  class="generate_password">
                                                <i class="fa fa-refresh"></i>
                                            </span>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label>Họ và tên đầy đủ</label>
                                    <input type="full" name="full" class="form-control" value="{{old('full',$user->full)}}">
                                </div>
                                {{showError($errors,'full')}}
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="address" name="address" class="form-control" value="{{old('address',$user->address)}}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="phone" name="phone" class="form-control" value="{{old('phone',$user->phone)}}">
                                </div>
                                {{showError($errors,'phone')}}
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="level" class="form-control" value="">
                                        <option @if ($user->level==1){{"selected"}}@endif value="1">
                                            admin
                                        </option>
                                        <option @if ($user->level==2){{"selected"}}@endif value="2">
                                           user
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success"  type="submit">Sửa thành viên</button>
                                    <a href="/admin/user" class="btn btn-danger" type="reset">Huỷ bỏ</a>
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
    <script>
            $(".toggle-password").click(function() {
                $(this).find('i').toggleClass("fa-eye-slash");
                if ($("#pass").attr('type')==="password") {
                    $("#pass").attr('type','text');
                }else{
                    $("#pass").attr('type','password');
                }
            });
            function randomPassword(length) {
                var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
                var pass = "";
                for (var x = 0; x < length; x++) {
                    var i = Math.floor(Math.random() * chars.length);
                    pass += chars.charAt(i);
                }
                return pass;
            }

            function generate() {
                $('#pass').val(randomPassword(10));
            }
        </script>

@endsection