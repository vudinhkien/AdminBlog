@extends('index')
@section('content')
@if(!isset($getNewsById))
<div id="calltoaction">
	<div class="jumbotron">
		<div class="container">
			<h1>TAOBAO - BLOG</h1>
			<p class="ptaobao">TÁO BẠO LÀ PHONG CÁCH CỦA CHÚNG TÔI</p>
				<a href="#feature2" id="nut" class="btn btn-success btn-lg about">About</a>
				   <a href="#feature3" id="nut2" class="btn btn-lg btn-feature">Profile</a>
		</div>
	</div>
</div>
			
<div id="feature1">
   <div class="container">
		<div class="row bophan">
			@foreach($getData as $val)
			<div class="col-sm-3">
				<a href="{{ route('frontendIdDep',[$val->dep_id]) }}">
					{{ $val->icon }}
			   	<h3>{{ $val->dep_name }} </h3>
				</a>
			   <p>{{ $val->comment }} </p>
			</div>
			@endforeach
		</div>
	</div>
</div>

<div id="feature2">
   <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>SLIDE - BLOG</h2>
				<p class="lead">Ảnh chạy</p>
			</div>
		</div>
   </div>
</div>
<div id="feature3">
	@yield('newsbydep') 
</div>

<div id="feature4">
   <div class="container">
		<div class="row">
			<form action="" method="post" class="form-inline">
				<div class="form-group col-xs-12 col-sm-5 col-sm-offset-2">
					<label for="" class="sr-only">Email</label>
					<input type="text" class="form-control input-lg"  placeholder="Nhập địa chỉ email ..." />
				</div>
				<div class="form-group col-xs-12 col-sm-3">
					<button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">ĐĂNG KÝ</button>
				</div>
			</form>
		</div>
   </div>
</div>
@else {{-- nếu tồn tại id của news thì thành trang news chi tiết --}}
	<div class="container">
		@foreach($getNewsById as $val)
			<div class="row newsdetail">
				<h3>{{ $val->title }}</h3>
				<span>
					<?php 
						$date_int = strtotime( $val->ngaydangbai);
						$time_vietnam = date('d-m-Y', $date_int );
						echo $time_vietnam;  
					?>
				</span>
				<p class ="tomtat">{{ $val->tomtat }}</p>
				<img src="/upload/{{ $val->images }}" alt=""/>
				<p class ="content">{{ $val->content }}</p>
			</div>
			<!--comentface-->
	      <div style="border:#CCC solid 1px;width:715px" class="fb-comments" 
	      data-href="#" data-numposts="5" data-colorscheme="light"></div>
	      </div>
		@endforeach
	</div>
@endif
@endsection