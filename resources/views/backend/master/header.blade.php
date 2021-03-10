{{-- <!-- header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span>Store </span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  @if (Auth::check()){{Auth::user()->full}} @endif<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu"><li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
                    <li><a href="/admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<!-- header --> --}}

<style>.dropdown-container{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:200px;max-width:330px;margin:2px 0 0;list-style:none;font-size:14px;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,0.15);border-radius:4px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,0.175);box-shadow:0 6px 12px rgba(0,0,0,0.175);background-clip:padding-box}.dropdown-container>.dropdown-menu{position:static;z-index:1000;float:none !important;padding:10px 0;margin:0;border:0;background:transparent;border-radius:0;-webkit-box-shadow:none;box-shadow:none;max-height:330px;overflow-y:auto}.dropdown-container>.dropdown-menu+.dropdown-menu{padding-top:0}.dropdown-menu>li>a{overflow:hidden;white-space:nowrap;word-wrap:normal;text-decoration:none;text-overflow:ellipsis;-o-text-overflow:ellipsis;-webkit-transition:none;-o-transition:none;transition:none}.dropdown-toggle{cursor:pointer}.dropdown-header{white-space:nowrap}.open>.dropdown-container>.dropdown-menu,.open>.dropdown-container{display:block}.dropdown-toolbar{padding-top:6px;padding-left:20px;padding-right:20px;padding-bottom:5px;background-color:#fff;border-bottom:1px solid rgba(0,0,0,0.15);border-radius:4px 4px 0 0}.dropdown-toolbar>.form-group{margin:5px -10px}.dropdown-toolbar .dropdown-toolbar-actions{float:right}.dropdown-toolbar .dropdown-toolbar-title{margin:0;font-size:14px}.dropdown-footer{padding:5px 20px;border-top:1px solid #ccc;border-top:1px solid rgba(0,0,0,0.15);border-radius:0 0 4px 4px}.anchor-block small{display:none}@media (min-width:992px){.anchor-block small{display:block;font-weight:normal;color:#777777}.dropdown-menu>li>a.anchor-block{padding-top:6px;padding-bottom:6px}}@media (min-width:992px){.dropdown.hoverable:hover>ul{display:block}}.dropdown-position-topright{top:auto;right:0;bottom:100%;left:auto;margin-bottom:2px}.dropdown-position-topleft{top:auto;right:auto;bottom:100%;left:0;margin-bottom:2px}.dropdown-position-bottomright{right:0;left:auto}.dropmenu-item-label{white-space:nowrap}.dropmenu-item-content{position:absolute;text-align:right;max-width:60px;right:20px;color:#777777;overflow:hidden;white-space:nowrap;word-wrap:normal;-o-text-overflow:ellipsis;text-overflow:ellipsis}small.dropmenu-item-content{line-height:20px}.dropdown-menu>li>a.dropmenu-item{position:relative;padding-right:66px}.dropdown-submenu .dropmenu-item-content{right:40px}.dropdown-menu>li.dropdown-submenu>a.dropmenu-item{padding-right:86px}.dropdown-inverse .dropdown-menu{background-color:rgba(0,0,0,0.8);border:1px solid rgba(0,0,0,0.9)}.dropdown-inverse .dropdown-menu .divider{height:1px;margin:9px 0;overflow:hidden;background-color:#2b2b2b}.dropdown-inverse .dropdown-menu>li>a{color:#cccccc}.dropdown-inverse .dropdown-menu>li>a:hover,.dropdown-inverse .dropdown-menu>li>a:focus{color:#fff;background-color:#262626}.dropdown-inverse .dropdown-menu>.active>a,.dropdown-inverse .dropdown-menu>.active>a:hover,.dropdown-inverse .dropdown-menu>.active>a:focus{color:#fff;background-color:#337ab7}.dropdown-inverse .dropdown-menu>.disabled>a,.dropdown-inverse .dropdown-menu>.disabled>a:hover,.dropdown-inverse .dropdown-menu>.disabled>a:focus{color:#777777}.dropdown-inverse .dropdown-header{color:#777777}.table>thead>tr>th.col-actions{padding-top:0;padding-bottom:0}.table>thead>tr>th.col-actions .dropdown-toggle{color:#777777}.notifications{list-style:none;padding:0}.notification{display:block;padding:9.6px 12px;border-width:0 0 1px 0;border-style:solid;border-color:#eeeeee;background-color:#fff;color:#333333;text-decoration:none}.notification:last-child{border-bottom:0}.notification:hover,.notification.active:hover{background-color:#f9f9f9;border-color:#eeeeee}.notification.active{background-color:#f4f4f4}a.notification:hover{text-decoration:none}.notification-title{font-size:15px;margin-bottom:0}.notification-desc{margin-bottom:0}.notification-meta{color:#777777}.dropdown-notifications>.dropdown-container,.dropdown-notifications>.dropdown-menu{width:308px;max-width:308px}.dropdown-notifications .dropdown-menu{padding:0}.dropdown-notifications .dropdown-toolbar,.dropdown-notifications .dropdown-footer{padding:9.6px 12px}.dropdown-notifications .dropdown-toolbar{background:#fff}.dropdown-notifications .dropdown-footer{background:#eeeeee}.notification-icon{margin-right:6.8775px}.notification-icon:after{position:absolute;content:attr(data-count);margin-left:-6.8775px;margin-top:-6.8775px;padding:1px 4px;min-width:13.755px;height:13.755px;line-height:13.755px;background:green;border-radius:10px;color:#fff;text-align:center;vertical-align:middle;font-size:11.004px;font-weight:600;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}.notification .media-body{padding-top:5.6px}.btn-lg .notification-icon:after{margin-left:-8.253px;margin-top:-8.253px;min-width:16.506px;height:16.506px;line-height:16.506px;font-size:13.755px}.btn-xs .notification-icon:after{content:'';margin-left:-4.1265px;margin-top:-2.06325px;min-width:6.25227273px;height:6.25227273px;line-height:6.25227273px;padding:0}.btn-xs .notification-icon{margin-right:3.43875px}</style>
<style>
  li.dropdown.dropdown-notifications2 .notification-icon:after{
    background: red;
  }
  .dropdown-notifications2 .dropdown-menu{
    padding: 0;
  }
  .dropdown-notifications2>.dropdown-container{
    width: 256px;
    max-width: 256px;
  }
  .dropdown-notifications2 .dropdown-footer {
    background: #eeeeee;
  }
  .dropdown-notifications2 .dropdown-toolbar, .dropdown-notifications2 .dropdown-footer {
      padding: 9.6px 12px;
  }
</style>
<header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>MS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>MaxShop</span>
        </a>
    
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="/* display: none; */">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!--thông báo comment-->
              <li class="dropdown dropdown-notifications">
                  <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                      <i data-count="0" class="glyphicon glyphicon-comment notification-icon"></i>
                  </a>

                  <div class="dropdown-container">
                      <div class="dropdown-toolbar">
                          <div class="dropdown-toolbar-actions">
                              <a href="#">Đánh dấu đã đọc</a>
                          </div>
                          <h3 class="dropdown-toolbar-title">Thông báo (<span class="notif-count">0</span>)</h3>
                      </div>
                      <ul class="dropdown-menu">
                      </ul>
                      <div class="dropdown-footer text-center">
                          <a href="/admin/comment">Xem thêm</a>
                      </div>
                  </div>
              </li>

              <!--thông báo đơn hàng-->
              <li class="dropdown dropdown-notifications2">
                  <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                      <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                  </a>

                  <div class="dropdown-container">
                      <div class="dropdown-toolbar">
                          <div class="dropdown-toolbar-actions">
                              <a href="#">Đánh dấu đã đọc</a>
                          </div>
                          <h3 class="dropdown-toolbar-title">Thông báo (<span class="notif-count">0</span>)</h3>
                      </div>
                      <ul class="dropdown-menu">
                      </ul>
                      <div class="dropdown-footer text-center">
                          <a href="/admin/order">Xem thêm</a>
                      </div>
                  </div>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" style="margin-top:0">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/user1-128x128.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">
                        @if (Auth::check())
                            {{Auth::user()->full}}
                        @endif
                    </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/user1-128x128.jpg" class="img-circle" alt="User Image">
    
                    <p>
                        @if (Auth::check())
                            {{Auth::user()->full}}
                        @endif - Big Fan of Manchester City Club
                      <small>Member since Oct. 2012</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Thông tin cá nhân</a>
                    </div>
                    <div class="pull-right">
                      <a href="/admin/logout" class="btn btn-default btn-flat">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
    
        </nav>
      </header>
@section('script')
    @parent
    <script src="js/pusher.min.js"></script>  
    <!--thông báo có bình luận mới-->
    <script type="text/javascript">
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('ul.dropdown-menu');
    
        // if (notificationsCount <= 0) {
        //     notificationsWrapper.hide();
        // }
    
        //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này
        var pusher = new Pusher('5e50a3612e837c45848a', {
            encrypted: true,
            cluster: "ap1"
        });
    
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('development');
    
        // var channel2 = pusher.subscribe('development2');
    
        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\HelloPusherEvent', function(data) {
          //channel.bind('App\\Http\\Controllers\\frontend\\HelloPusherEvent', function(data) {
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml = `
              <li class="notification active">
                  <div class="media">
                    <div class="media-left">
                      <div class="media-object">
                        <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                      </div>
                    </div>
                    <div class="media-body">
                      <strong class="notification-title"><a href="/admin/comment/">`+data.message+`</a></strong>
                      <p class="notification-desc">`+data.content+`</p>
                      <div class="notification-meta">
                        <small class="timestamp">vài giây trước</small>
                      </div>
                    </div>
                  </div>
              </li>
            `;
            notifications.html(newNotificationHtml + existingNotifications);
    
            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.dropdown-notifications .notif-count').text(notificationsCount);
            notificationsWrapper.show();
        });
    </script>

    <!--thông báo có đơn hàng mới-->
    <script>
      var notificationsWrapper2   = $('.dropdown-notifications2');
      var notificationsToggle2    = notificationsWrapper2.find('a[data-toggle]');
      var notificationsCountElem2 = notificationsToggle2.find('i[data-count]');
      var notificationsCount2     = parseInt(notificationsCountElem2.data('count'));
      var notifications2          = notificationsWrapper2.find('.dropdown-menu');

      //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này
      var pusher = new Pusher('5e50a3612e837c45848a', {
          encrypted: true,
          cluster: "ap1"
      });
  
      // Subscribe to the channel we specified in our Laravel Event
     
      var channel2 = pusher.subscribe('development2');
  
      // Bind a function to a Event (the full Laravel class)
      channel2.bind('App\\Events\\OrderPusherEvent', function(data) {
          //channel.bind('App\\Http\\Controllers\\frontend\\HelloPusherEvent', function(data) {
            var existingNotifications2 = notifications2.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml2 = `
              <li class="notification active">
                  <div class="media">
                    <div class="media-left">
                      <div class="media-object">
                        <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                      </div>
                    </div>
                    <div class="media-body">
                      <strong class="notification-title"><a href="/admin/order/">`+data.message+`</a></strong>
                      <p class="notification-desc">`+data.content+`</p>
                      <div class="notification-meta">
                        <small class="timestamp">vài giây trước</small>
                      </div>
                    </div>
                  </div>
              </li>
            `;
            notifications2.html(newNotificationHtml2 + existingNotifications2);
    
            notificationsCount2 += 1;
            notificationsCountElem2.attr('data-count', notificationsCount2);
            notificationsWrapper2.find('.notif-count').text(notificationsCount2);
            notificationsWrapper2.show();
        });
    </script>
@endsection