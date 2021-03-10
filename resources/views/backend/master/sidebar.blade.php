{{-- <!-- sidebar left-->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
		<li @yield('admin')><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
		<li @yield('category')><a href="/admin/category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
		<li @yield('product')><a href="/admin/product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
		<li @yield('order')><a href="/admin/order"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
		<li @yield('comment')><a href="/admin/comment"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>Bình luận</a></li>
		<li role="presentation" class="divider"></li>
		@if (Auth::user()->level==1)
		<li @yield('user')><a href="/admin/user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
		@endif
	</ul>

</div>
<!--/. end sidebar left--> --}}

<aside class="main-sidebar sidebar" style="position: fixed;overflow: hidden">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="" style="height: auto;">
		  <!-- Sidebar user panel -->
		  <div class="user-panel">
			<div class="pull-left image">
			  <img src="images/user1-128x128.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			  <p>@if (Auth::check())
					{{Auth::user()->full}}
				@endif</p>
			  <a href="/admin"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		  </div>
		  <!-- search form -->
		  <form action="#" method="get" class="sidebar-form" style="padding:0">
			<div class="input-group">
			  <input type="text" name="q" class="form-control" placeholder="Search...">
			  <span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
					  <i class="fa fa-search"></i>
					</button>
				  </span>
			</div>
		  </form>
		  <!-- /.search form -->
		  <!-- sidebar menu: : style can be found in sidebar.less -->
		  <ul class="sidebar-menu tree" data-widget="tree">
			<li class="header">MÀN HÌNH CHÍNH</li>
			<li @yield('admin')><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng Quan</a></li>
			@if (Auth::user()->level==1)
			<li @yield('user')><a href="/admin/user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Danh Sách Nhân Viên</a></li>
			@endif
			<li @yield('category')><a href="/admin/category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
			<li @yield('product')><a href="/admin/product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản Phẩm</a></li>
			<li class="treeview @yield('order')">
				<a href="/admin/order"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> 
					Đơn Hàng
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" style="">
					<li class="@yield('unOrder')"><a href="/admin/order"><i class="fa fa-circle-o"></i> Đơn Hàng Chưa Xử Lý</a></li>
					<li class="@yield('orderProcessed')"><a href="/admin/order/processed"><i class="fa fa-circle-o"></i> Đơn Hàng Đã Xử Lý</a></li>
					<li class="@yield('orderCancel')"><a href="/admin/order/cancel"><i class="fa fa-circle-o"></i> Đơn Hàng Đã Hủy</a></li>
				</ul>
			</li>
			
			<li class="treeview @yield('comment')">
				<a href="/admin/comment">
					<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
					Bình Luận
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" style="">
					<li class="@yield('unActiveComment')"><a href="/admin/comment"><i class="fa fa-circle-o"></i> Bình Luận Chưa Duyệt</a></li>
					<li class="@yield('activeComment')"><a href="/admin/comment/active"><i class="fa fa-circle-o"></i> Bình Luận Đã Duyệt</a></li>
				</ul>
			</li>
			<li @yield('customer')><a href="/admin/customer"><i class="fa fa-users" aria-hidden="true" style="margin-right: 6px;"></i>Khách Hàng</a></li>
			@if (Auth::user()->level==1)
				<li @yield('report')><a href="/admin/report"><i class="fa fa-sliders" aria-hidden="true" style="margin-right: 6px;"></i>Thống Kê</a></li>
			@endif
			
		  </ul>
		</section>
		<!-- /.sidebar -->
	  </aside>