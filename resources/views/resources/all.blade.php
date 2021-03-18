@extends("layouts/front")

@section("content")
	<div class="container">
		<div class="contact-content mg-t-30 mg-b-30">
		<div class="box box-primary ">
			<h1 class="box-header">Nos ressources</h1>
			<div class="box-body">
				<div class="row">
					<ul>
					@foreach($resources as $resource)
					<h5>
					<li>
						{{$resource->title}}
						<a href="{{ asset("storage/resources/".$resource->attachment->blob->filename)}}">(Télécharger)</a>
					</li>
				</h5>
					@endforeach
					</ul>
				</div>
				
			</div>
		</div>

	</div>
	</div>
@endsection