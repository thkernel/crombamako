<div class="container">
    <div class="row">
        <div class="col-md-12 ">

			@if ($message = Session::get('success'))

			<div class="alert alert-success alert-block mg-t-20">

				<button type="button" class="close" data-dismiss="alert">×</button>	

			        <strong>{{ $message }}</strong>

			</div>

			@endif


			@if ($message = Session::get('error'))

			<div class="alert alert-danger alert-block mg-t-20">

				<button type="button" class="close" data-dismiss="alert">×</button>	

			        <strong>{{ $message }}</strong>

			</div>

			@endif


			@if ($message = Session::get('warning'))

			<div class="alert alert-warning alert-block mg-t-20">

				<button type="button" class="close" data-dismiss="alert">×</button>	

				<strong>{{ $message }}</strong>

			</div>

			@endif


			@if ($message = Session::get('info'))

			<div class="alert alert-info alert-block mg-t-20">

				<button type="button" class="close" data-dismiss="alert">×</button>	

				<strong>{{ $message }}</strong>

			</div>

			@endif


			
		</div>
	</div>
</div>