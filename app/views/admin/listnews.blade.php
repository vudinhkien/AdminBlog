@extends('admin.index')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<form method="get" class="search" >
            <input class="search1" type="text" placeholder="TÌM KIẾM" name="keyword" />
            <input class="search1-buttom" type="submit" value="Tìm Kiếm" />
         </form> 
			<table class="table table-bordered table-striped table-condensed flip-content">
				<thead class="flip-content">
					<tr>
						<th width="5%">STT</th>
						<th>Tiêu đề</th>
						<th>Ảnh</th>
						<th>Mô tả ngắn</th>
						<th>Danh Mục</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>

				<tbody>
					<?php
						 $i = 0;
						// echo"<pre>";
						// print_r($sendAllDataNews);
						// echo"</pre>";
						// die;
						foreach($sendAllDataNews as $val){
						$i++;
					?>
						<tr>
							<td> {{ $i }} </td>
							<td> {{ $val->title }} </td>
							<td><img width="200" src="/upload/{{ $val->images }}"></td>
							<td> {{ $val->tomtat }} </td>
                		<td>{{ $val->cat_name }}</td>

						 	<form action="{{ asset('admin/delete-news') }}" method="post">
			               <td class="numeric">
				               <a href=" {{ route('sendIdNews',[$val->id]) }} " class="btn default btn-xs purple"><i class="fa fa-edit"></i>
				               	Sửa
				            	</a>
			            	</td>
			               <td class="numeric">
				               <input type="hidden" name="id" value="{{ ($val->id) }}" />
				               <input class="delete" type="submit" value="Xóa" /></a><strong></strong>
			            	</td>
		               </form>
						</tr>
					<?php } ?>
		   	</tbody>
			</table>
			{{ $sendAllDataNews->links() }} <!-- phân trang -->       
		</div>
		<p class="thongbao">
			@if($sucess = Session::get('bao_thanh_cong'))
				{{ $sucess }}
			@endif

			@if($error = Session::get('bao_loi'))
				{{ $error }}
			@endif
		</p>
	</div>
@endsection
