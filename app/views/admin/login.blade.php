<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="{{Asset('assets/css-admin/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css-admin/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css-admin/style.css')}}"/>
</head>
<body class="bodylogin">
<div class="container">
	<div class="row login">
      <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title text-center">Đăng nhập</h3>
            </div>
            <div class="panel-body">
               <form accept-charset="UTF-8" role="form" id="login_form" action="{{ asset('admin/actionCheckLogin') }}" method="post">
               	{{ Form::token() }}
                  <fieldset>
                     <div class="form-group input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-user"></i>
                        </div>
                        <input class="form-control" placeholder="Email" name="email" value="{{ Input::old('email') }}" id="email" type="text" />
                     </div>
                     <div class="form-group input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-unlock"></i>
                        </div>
                        <input class="form-control" placeholder="Password" name="password" type="password" value="{{ Input::old('password') }}" id="password" />
                     </div>
                     <div class="form-group">
                        <label>
                           <input name="remember" type="checkbox" value="1" class="minimal-blue">
                            Remember Me
                        </label>
                     </div>
                     <input type="submit" class="btn btn-primary btn-block btn-md btn-responsive" value="Login" id="btnSubmit" name="btnSubmit">
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
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