@extends('frontend.master.master')
@section('title','Thông tin cá nhân')
@section('content')
<style>
  /* #page{
    background: red;
  } */
  .btn-submit{
    border-radius: 5px;
  }
  .account-form{
    background: url('/frontend/images/bg-04.jpg');
    padding: 5px 100px;
    background-attachment: fixed;
  }
</style>
@section('info','class=active')
    <div class="account-form">
      <h2>Thông tin cá nhân</h2>
      <form method="POST" id="account-form" class="" action="">
          @csrf
          <div class="form-group">
              <input type="text"  class="form-sign-input" name="full" id="full" placeholder="Họ và tên đầy đủ" value="{{old('full',$account->full)}}">
          </div>
          {{showError($errors,'name')}}
          <div class="form-group">
              <input type="email"  class="form-sign-input" name="email" id="email" placeholder="Email của bạn" value="{{old('email',$account->email)}}">
          </div>
          {{showError($errors,'email')}}
          <div class="form-group">
              <input type="text"  class="form-sign-input" name="phone" id="phone" placeholder="Số điện thoại" value="{{old('phone',$account->phone)}}">
          </div>
          {{showError($errors,'phone')}}
          <div class="form-group">
              <input type="text"  class="form-sign-input" name="address" id="address" placeholder="Địa chỉ" value="{{old('address',$account->address)}}">
          </div>
          {{showError($errors,'address')}}
          <div class="form-group">
              <input type="password"  class="form-sign-input" name="password" id="password" placeholder="Mật khẩu">
              <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
          </div>
          {{showError($errors,'password')}}
          <div class="form-group">
              <button type="submit" name="" id="" class="form-submit btn btn-success btn-submit"><i class="fa fa-floppy-o" aria-hidden="true" style="padding-right: 5px;"></i>Lưu</button>
          </div>
        </form>
    </div>
@endsection
@section('script')
    @parent
    <link href="css/toastr.min.css" rel="stylesheet">
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
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
@endsection
