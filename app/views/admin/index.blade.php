<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<link rel="stylesheet" href="{{Asset('assets/css-admin/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{Asset('assets/css-admin/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{Asset('assets/css-admin/style.css')}}"/>
</head>
<body>
<header>
   <marquee behavior="scroll" direction="left" scrollamount="10">
      CHÀO MỪNG BẠN ĐẾN VỚI HỆ THỐNG QUẢN TRỊ WEBSITE Blog.com.vn
   </marquee>
</header>
<section>
	<div class="col-md-2 left-sitebar">
		<div class="page-sidebar  sidebar-nav">
              <!-- BEGIN SIDEBAR MENU -->
         <ul id="menu" class="page-sidebar-menu list-unstyled">
            <li>
               <a href="{{ asset('admin/dashboard') }}">
                  <i class="fa fa-home dashboard"></i>
                  <span class="title">Dashboard</span>
               </a>
            </li>
            <li>
               <i class="fa fa-calendar-o"></i>
               <a href="{{ asset('admin/gioithieu') }}">Giới thiệu</a>
            </li>
            <li class="dropdown">
               <i class="fa fa-pencil-square-o"></i>
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý bài viết <span class="caret"></span></a>
               <ul class="dropdown-menu sub-menu">
                  <li><a href="{{ asset('admin/listnews') }}">List bài viết</a></li>
                  <li><a href="{{ asset('admin/listcat') }}">List danh mục</a></li>
                  <li><a href="{{ asset('admin/danhmuc') }}">Thêm danh mục</a></li>
                  <li><a href="{{ asset('admin/baiviet') }}">Thêm bài viết</a></li>
               </ul>
            </li>
            <li class="dropdown">
               <i class="fa fa-users"></i>
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý user <span class="caret"></span></a>
               <ul class="dropdown-menu sub-menu">
                  <li><a href="{{ asset('admin/showuser') }}">List User</a></li>
                  <li><a href="{{ asset('admin/themuser') }}">Thêm User</a></li>
               </ul>
            </li>
            <li class="dropdown">
               <i class="fa fa-bars"></i>
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý menu <span class="caret"></span></a>
               <ul class="dropdown-menu sub-menu">
                  <li><a href="#">List menu</a></li>
                  <li><a href="#">Thêm menu</a></li>
               </ul>
            </li>
         </ul>
      </div>
	</div>
	<div class="col-md-10 main-content">
      <div class="row">
         <div class="col-md-10 welcome">
            <a href="{{ asset('admin/index') }}">
               Welcome to dashboard
            </a>
         </div>
         <div class="col-md-2 logout">
            <div class="navbar-right">
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div>
                           <i class="fa fa-cog"></i>
                           <span>
                              <i class="caret"></i>
                           </span>
                        </div>
                     </a>
                     <ul class="dropdown-menu">
                      <!-- Menu Body -->
                        <li class="fullname">
                           {{ Session::get('name') }} 
                        </li>
                        <li>
                           <a href="{{ asset('admin/profile') }}">
                              <i class="fa fa-user"></i>
                              My Profile
                           </a>
                        </li>
                      <!-- Menu Footer-->
                        <li class="user-footer">
                           <a href="{{ asset('admin/logout') }}">
                              <i class="fa fa-sign-out"></i>
                               Logout
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
            {{-- <a href="{{ asset('admin/logout') }}"> Đăng xuất</a> --}}
      </div>
      <div class="row">    <!-- nội dung luôn thay đổi ta cắt tempalte -->
         <div class="content">
            @yield('content')
         </div
      </div>
	</div>
</section>
<script src="{{ Asset('assets/js-admin/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ Asset('assets/js-admin/bootstrap.min.js') }}"  type="text/javascript" ></script>
<!-- <script src="{{Asset('assets/js/tinymce/js/tinymce/tinymce.min.js')}}" type="text/javascript" ></script> -->
                           <!-- CÀI ĐẶT CKEDITOR -->
<!-- <script  src="{{ Asset('assets/ckeditor/adapters/jquery.js') }}" type="text/javascript" ></script>
<script  src="{{ Asset('assets/ckeditor/ckfinder/ckfinder.js') }}" type="text/javascript"></script> -->
<script  src="{{ Asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script>
   CKEDITOR.replace('editor1');
</script>
                           <!-- END CÀI ĐẶT CKEDITOR -->        
</body>
</html>
