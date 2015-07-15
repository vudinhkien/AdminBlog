@extends('admin.index')

@section('content')
<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">
			@if($edit->title == '')
				{{ "Thêm" }}
			@else
				{{ "Sửa" }} 
			@endif bài viết
		</h3>
	</div>
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
	<div class="panel-body border">
	   <form action="{{ asset('admin/thembaiviet') }}" method="post" class="form-horizontal form-bordered"  enctype="multipart/form-data">
			<div class="form-group">
				 <label class="col-md-3 control-label" for="example-text-input">Tiêu đề</label>
				 <div class="col-md-6">
					  <input type="text" id="example-text-input" name="title" class="form-control" placeholder="Tên tiêu đề"
					  value=" {{ Input::old('title', $edit->title) }}">     
				 </div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-file-input">Ảnh đại diện </label>
				<div class="col-md-9 pad-top20">
					<input type="file" id="example-file-input" name="file">
				</div>
				@if($edit->images != '')
					<img src=" /upload/{{ $edit->images }}" width="150" />
				@endif
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="example-textarea-input">Tóm tắt</label>
				<div class="col-md-9">
					<textarea class="form-control" cols="93" rows="10" name="tomtat">
						{{ $edit->tomtat }}
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="example-textarea-input">Nội dung</label>
				<div class="col-md-9">
					<textarea id="editor1" name="content">
						{{ $edit->content }}
					</textarea>
				</div>
			</div>  

			<div class="form-group">
				<label class="col-md-3 control-label" for="example-select">Danh mục</label>
				<div class="col-md-6">
					   <select id="example-select" name="cat_id" class="form-control" size="1">
							<option value="0">Bộ Phận</option>
								@foreach ($cats as $cat)

	                     <option value="{{ $cat->cat_id }}" 
	                     	{{ $edit->cat_id == $cat->cat_id ? 'selected' : '' }}
	                     >
									{{ $cat->cat_name }}
	                     </option>
								@endforeach
					   </select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Loại tin</label>
				<div class="col-md-9">
				   <div class="radio mar-left5">
						<label for="example-radio1">
				    		<input type="radio" id="example-radio1" name="hot" value="0" checked="checked">Tin thường
				    	</label>
					</div>
				   <div class="radio mar-left5">
						<label for="example-radio2">
							<input type="radio" id="example-radio2" name="hot" value="1">Tin hot
						</label>
				   </div>
				 </div>
			</div>
			<div class="form-group form-actions">
				<div class="col-md-9 col-md-offset-3">
				  <input type="hidden" name="id" value="{{ $edit->id }}" />
				  <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
				  <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
				</div>
			</div>
	   </form>
	</div>
</div>
@endsection