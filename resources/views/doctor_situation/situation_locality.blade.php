@extends("layouts.dashboard")

@section("content")
	<div class="container main-container">
		<div class="br-pageheader mg-t-20 mg-b-20">
	      <nav class="breadcrumb pd-0 mg-0 tx-12">
	        
	        <span class="breadcrumb-item active"><h5>Situation des médecins</h5></span>
	      </nav>
	    </div><!-- br-pageheader -->

		<div class="row">
		    <div class="col-md-12">
		    	@include('doctor_situation/partials/_search_bar_locality')
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
                		<div class="col-md-12">
                			<div class="pull-right result-wrapper">
                			Résultat: <span class="result-total">{{$results ? $results->count() : ''}}</span>
                		</div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-12">


				    	<table id="datatable" class="table display responsive nowrap">


						  <thead>
						    <tr>
						      
						      <th>N°Ins.</th>
						      <th>Médecin</th>
						      <th>Spécialité</th>
						      <th>Commune</th>
						      <th>Quartier</th>
						    
						    </tr>
						  </thead>

						  <tbody class="doctors">
						    @include('doctor_situation/partials/_search_result')
						  </tbody>
						</table>
					</div>
					</div>
				</div>
                
            </div>
        </div>
    </div>
    @endif


		   

			
@endsection