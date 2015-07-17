@extends('content')
@section('newsbydep')
	<div class="container">
		@foreach($getNewsByDep as $val)
			<div class="row">
				<div class="col-sm-6 col-sm-push-6 title-tintuc">
					<a href="{{ route('frontendIdNews',[$val->id]) }}">
						<img src="/upload/{{ $val->images }}" class="img-circle img-responsive center-block" alt=""/>
					</a>
				</div>
				<div class="col-sm-6 col-sm-pull-6 content-newsbydep">
					<h3 class="text-center"><a href="{{ route('frontendIdNews',[$val->id]) }}">{{ $val->title }}</a></h3>
					<p class="lead">{{ $val->tomtat }}</p>
				</div>
			</div>
		@endforeach
	</div>
@endsection