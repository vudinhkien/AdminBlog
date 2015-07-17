@extends('admin.index')
@section('content')
<div class="row">
	<div style="background-color:#FF0; margin-left:50px;" class="col-md-3">
		<div class="analytics">
			<div class="news">
				<div style="font-size:1.5em; font-weight:bold" class="text-uppercase text-center br"> Bảng News</div>
				<div class="row">
					<div class="pull-left">Tổng số bài viết</div><div class="pull-right"> <span class="badge"><?php echo $getAllRecordNews->count(); ?></span></div>
				</div>
				<div class="row">
					<div class="pull-left">Tin hot</div><div class="pull-right"> <span class="badge"><?php echo $getAllRecordHot->count(); ?></span></div>
				</div>
				<div class="row">
					<div class="pull-left">Tin thường</div><div class="pull-right"> <span class="badge"><?php echo $getAllRecordThuong->count(); ?></span></div>
				</div>
				<div class="row">
					<div class="pull-left"> admin</div><div class="pull-right"> <span class="badge"><?php echo $getAllRecordUser->count(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection