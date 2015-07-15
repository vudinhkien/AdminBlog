@extends('admin.index')

@section('content')
<div class="row">
<div class="panel-body border">
	<fieldset>
		<legend>  <?php if(isset($edit)){echo "Sửa";}else {echo "Thêm";} ?> danh mục</legend>
		<form action="{{ asset('admin/actioncategory') }}" method="post" class="form-horizontal form-bordered">
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-text-input">
					Tên danh mục
				</label>
				<div class="col-md-6">
					<input type="text" id="example-text-input" name="cat_name" class="form-control" placeholder="Tên danh mục"
					value="<?php if(isset($edit)){ echo $edit['cat_name']; } ?>">     
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-email">Position</label>
				<div class="col-md-6">
					<input type="text" id="example-email" name="position" class="form-control" placeholder="Thứ tự"
					value="<?php if(isset($edit)){echo $edit['position'] ; } ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-select">Lựa chọn danh mục cha</label>
				<div class="col-md-6">
					<select id="example-select" name="parent_id" class="form-control" size="1">
						<option value="0">Không có danh mục cha</option>
						@foreach ($cats as $cat)
                     	<option value="{{ $cat['cat_id'] }}">{{ $cat['cat_name'] }}</option>
						@endforeach	
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Hiển thị ra trang chủ</label>
				<div class="col-md-9">
					<div class="radio mar-left5">
						<label for="example-radio1">
							<input type="radio" id="example-radio1" name="home" value="0" checked="checked">Không
						</label>
					</div>
					<div class="radio mar-left5">
						<label for="example-radio2">
							<input type="radio" id="example-radio2" name="home" value="1">Có
						</label>
					</div>
				 </div>
			</div>
			<div class="form-group form-actions">
				<div class="col-md-9 col-md-offset-3">
					<input type="hidden" name="id"
					   value="<?php if(isset($edit)){ echo $edit['cat_id']; } ?>" />
					<button type="submit" name="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
					<button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
				</div>
			</div>
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
