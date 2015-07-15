<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<link rel="stylesheet" href="{{Asset('assets/css/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
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
               <i class="fa fa-users"></i>
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
         <div class="col-md-9 welcome">
            Welcome to dashboard
         </div>
         <div class="col-md-3 trangchu">
            <i class="fa fa-home"></i><a href="{{ asset('admin/index') }}"> Trang Chủ</a>
         </div>
      </div>
      <div class="row">    <!-- nội dung luôn thay đổi ta cắt tempalte -->
         <div class="content">
            @yield('content')
         </div
      </div>
	</div>
</section>
<script src="{{ Asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ Asset('assets/js/bootstrap.min.js') }}"  type="text/javascript" ></script>
<!-- <script src="{{Asset('assets/js/tinymce/js/tinymce/tinymce.min.js')}}" type="text/javascript" ></script> -->
                           <!-- CÀI ĐẶT CKEDITOR -->
<script  src="{{ Asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<!-- <script  src="{{ Asset('assets/ckeditor/adapters/jquery.js') }}" type="text/javascript" ></script>
<script  src="{{ Asset('assets/ckeditor/ckfinder/ckfinder.js') }}" type="text/javascript"></script> -->
<script>
   CKEDITOR.replace('editor1');
</script>
                           <!-- END CÀI ĐẶT CKEDITOR -->        
</body>
</html>
