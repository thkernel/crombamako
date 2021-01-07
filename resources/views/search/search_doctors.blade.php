@extends("layouts.front")

@section("content")
	<div class="container main-container">
	    <div class="col-md-12">
	      @include('search/partials/_search_bar')
	    </div>

	    <div class="col-md-12">

	       @include('search/partials/_search_result')

	    </div>
	</div>


			
@endsection