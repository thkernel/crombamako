@extends("layouts/front")

@section("content")
	<div class="container">
		<div class="title">
			<h2>{{$page->title}}</h2>
		</div>
		<div class="content">
			{!! $page->content !!}
		</div>
	</div>
@endsection