@extends('admin.index')
@section('content')
	<div class="row">
		<div class="panel-body border1">
			<fieldset>
				<legend> <?php if(isset($edit)){echo "Sửa";}else {echo "Đăng Ký";} ?> Tài Khoản</legend>
					<form action="{{ asset('admin/dangkyuser') }}" method="post">
						<label>Họ và Tên</label>
						<input type="text" name="name" id="name" value="{{ Input::old('name') }}<?php if(isset($edit)) echo $edit['name'];?>" class="form-control">

						<label>Tài Khoản</label>
						<input type="email" name="email" value="{{ Input::old('email') }} <?php if(isset($edit)) echo $edit['email'];?>" id="email" class="form-control" placeholder="Nhập định dạng email">

						<input type="checkbox" class="check-box" name="role" value="1">Admin</br>

						<label>Mật Khẩu</label>
						<input type="password" name="password" value="{{ Input::old('password') }}" id="password" class="form-control">

						<label>Địa Chỉ </label>
						<input type="text" name="address" id="address" value="{{ Input::old('address') }} <?php if(isset($edit)) echo $edit['address'];?>" class="form-control">
							
						<input type="hidden" name="id" value="<?php if(isset($edit)) echo $edit['id'];?>" />
						<button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
						<button type="reset" class="btn btn-effect-ripple btn-danger">Hủy Bỏ</button>
					</form>
			</fieldset>
			@if ( $errors->any() )
				<ul class="style_validator">
					@foreach ( $errors->all() as $error )
						<li>{{ $error }}</li>
					@endforeach
				</ul>	
			@endif
			@if($sucess = Session::get('bao_thanh_cong'))
					{{ $sucess }}
				@endif

				@if($error = Session::get('bao_loi'))
					{{ $error }}
			@endif
		</div>
	</div>
@endsection