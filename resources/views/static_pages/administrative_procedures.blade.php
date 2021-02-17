@extends("layouts/front")

@section("content")
	<div class="container">
		@if ($page)
			<div class="title">
				<h2>{{$page->title}}</h2>
			</div>
			<div class="content">
				{!! $page->content !!}
			</div>
		@endif
		
	</div>
@endsection