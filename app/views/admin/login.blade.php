<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
</head>
<body>
<div class="containner">
	<div class="row login">
		
		<fieldset>
			<legend> ĐĂNG NHẬP </legend>
				<form action="{{ asset('admin/actionCheckLogin') }}" method="post">
					{{ Form::token() }} <!-- bắt buộc có -->
					Tài Khoản
					<input type="text" name="email" value="{{ Input::old('email') }}" id="username" class="form-control">
					Mật Khẩu
					<input type="password" name="password" value="{{ Input::old('password') }}" id="password" class="form-control">
					<button type="submit" class="btn btn-effect-ripple btn-primary">Đăng Nhập</button>
					<button type="reset" class="btn btn-effect-ripple btn-danger">Hủy Bỏ</button>
				</form>
		</fieldset>
	</div>
	<p class="thongbao">
		@if ( $errors->any() )
		<ul>
			@foreach ( $errors->all() as $error )
				<li>{{ $error }}</li>
			@endforeach
		</ul>	
		@endif

		@if($sucess = Session::get('success'))
			{{ $sucess }}
		@endif

		@if($error = Session::get('error'))
			{{ $error }}
		@endif
	</p>
</div>
</body>
</html>