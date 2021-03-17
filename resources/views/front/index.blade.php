
@extends("layouts/front")

@section("content")
	<!-- HERO SECTION -->
	<div class="section-hero">
		@include('front/partials/_hero')
	</div>

	<!-- 
	<div class="section-about">
		include('front/partials/_about')
	</div>
	-->
	<div class="section-latest-posts">
		<div class="container">
		@include('front/partials/_latest_posts')
	</div>
	</div>

	<div class="section-latest-opportunities">
		<div class="container">
		@include('front/partials/_latest_opportunities')
	</div>
	</div>

	
@endsection

