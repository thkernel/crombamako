@extends("layouts.dashboard")

@section("content")
	<div class="container main-container">
		<div class="row">
		    <div class="col-md-12">
		    	@include('doctor_situation/partials/_search_bar')
			</div>
		</div>
	</div>

		@if ($results == null || $results->count() <= 0)
		    <div class="container main-container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="card">
		                    <div class="card-body text-center">
		                        <p>
		                            <h5>Pas de résultat pour cette recherche!</h5>
		                        </p>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		@else
		    
			<div class="container main-container">
        		<div class="card">
            		<div class="card-body">
                		<div class="row">


		    <table id="datatable" class="table display responsive nowrap">


			  <thead>
			    <tr>
			      <th>Date</th>
			      <th>N°Inscrip.</th>
			      <th>Médecin</th>
			    
			    </tr>
			  </thead>

			  <tbody class="doctors">
			    @include('doctor_situation/partials/_search_result')
			  </tbody>
			</table>


		    

		    
		</div>
	</div>


			
@endsection