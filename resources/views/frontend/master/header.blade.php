<nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="/"><img src="images/logo3.png" alt="" style="width:
                        70%"></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <div class="col-md-4">
                            {{-- <div class="search-box">
                                <form action="/search" method="get">
                                    <input id="txb" name="keyword" type="text" class="sb-text" placeholder="Nhập sản phẩm cần tìm kiếm ...">
                                    <button id="btn-search" type="submit" class="sb-submit" ><i class="fa fa-search"></i></button>
                                </form>
                            </div> --}}
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li @yield('home')><a href="/">Trang chủ</a></li>
                                <li class="has-dropdown @yield('product')">
                                    <a href="/product">Cửa hàng</a>
                                    <ul class="dropdown">
                                        <li><a href="/cart">Giỏ hàng</a></li>
                                        <li><a href="/checkout">Thanh toán</a></li>
    
                                    </ul>
                                </li>
                                <li @yield('about')><a href="/about">Giới thiệu</a></li>
                                <li @yield('contact')><a href="/contact">Liên hệ</a></li>
                                <li class="@yield('cart')"><a href="/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{Cart::count()}}]</a></li>
                                @if(Auth::check())
                                    @if(Auth::user()->level ==3)
                                        <li><a href="/account/info/{{Auth::user()->id}}">{{Auth::user()->full}}</a></li>
                                        <li><a href="/logout">Logout</a></li>
                                    @endif
                                @elseif(!Auth::check())
                                        <li data-toggle="modal" data-target="#modalSignUp" class="btn-sign">Đăng ký|</li>
                                        <li data-toggle="modal" data-target="#modalSignIn" class="btn-sign">Đăng nhập</li>
                                @endif
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
     <!-- Modal -->
    <div class="modal fade" id="modalSignUp" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Đăng ký</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="signup-form" class="signup-form" action="/signup">
                    @csrf
                    <div class="form-group">
                        <input type="text"  class="form-sign-input" name="full" id="full" placeholder="Họ và tên đầy đủ">
                    </div>
                    {{showError($errors,'name')}}
                    <div class="form-group">
                        <input type="email"  class="form-sign-input" name="email" placeholder="Email của bạn">
                    </div>
                    {{showError($errors,'email')}}
                    <div class="form-group">
                        <input type="text"  class="form-sign-input" name="phone" id="phone" placeholder="Số điện thoại">
                    </div>
                    {{showError($errors,'phone')}}
                    <div class="form-group">
                        <input type="text"  class="form-sign-input" name="address" id="address" placeholder="Địa chỉ">
                    </div>
                    {{showError($errors,'address')}}
                    <div class="form-group" style="position: relative">
                        <input type="password"  class="form-sign-input" name="password" id="password" placeholder="Mật khẩu" autocomplete="off">
                        <span class="toggle-password">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    {{showError($errors,'password')}}
                    <div class="form-group" style="position: relative">
                        <input type="password"  class="form-sign-input" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu" autocomplete="off">
                        {{-- <span class="toggle-password2">
                            <i class="fa fa-eye"></i>
                        </span> --}}
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                        <label for="agree-term" class="label-agree-term" style="color: #fff;"><span><span></span></span>Tôi đồng ý với  <a href="#" class="term-service">Chính sách bảo mật MaxShop</a></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" class="form-submit btn btn-info" value="Đăng ký">
                        {{-- <button  name="" id="" class="form-submit btn btn-primary" value="" data-toggle="modal" data-target="#modalSignIn">Đăng nhập</button> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        
        </div>
    </div>
    <div class="modal fade" id="modalSignIn" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="signin-form" class="signin-form" action="/signin">
                    @csrf
                    <div class="form-group">
                        <input type="text"  class="form-sign-input" name="email2" id="email2" placeholder="Email/Số điện thoại của bạn">
                    </div>
                    {{showError($errors,'email2')}}
                    <div class="form-group" style="position: relative;">
                        <input type="password"  class="form-sign-input" name="password2" id="pass" placeholder="Mật khẩu" autocomplete="off">
                        <span class="toggle-password">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    {{showError($errors,'password2')}}
                    <div class="form-group">
                        <input type="submit" name="" class="form-submit btn btn-info" value="Đăng nhập">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Đóng</button>
            </div>
          </div>
          
        </div>
    </div>


@section('script')
    @parent
    <script>
        $(document).ready(function(){
            $("#signup-form").submit(function(e){
                if($('#agree-term').is(":not(:checked)")){ 
                    e.preventDefault();
                    alert('Bạn chưa đồng ý với điều khoản');
                }
                else{
                    $("#signup-form").submit();
                }
                
            });
        });
        $(".toggle-password").click(function() {
            // $(this).find('i').toggleClass("aaa");
            if ($("#pass").attr('type')==="password") {
                $("#pass").attr('type','text');
            }else{
                $("#pass").attr('type','password');
            }
        });
        $(".toggle-password").click(function() {
            $(this).find('i').toggleClass("fa-eye-slash");
            if ($("#password").attr('type')==="password") {
                $("#password").attr('type','text');
            }else{
                $("#password").attr('type','password');
            }
        });
        // $(".toggle-password2").click(function() {
        //     $(this).find('i').toggleClass("fa-eye-slash");
        //     if ($("#re_password").attr('type')==="password") {
        //         $("#re_password").attr('type','text');
        //     }else{
        //         $("#re_password").attr('type','password');
        //     }
        // });
        
    </script>
@endsection
    