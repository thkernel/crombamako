@extends("layouts.dashboard")

@section("content")
	<div class="container main-container">
		<div class="br-pageheader mg-t-20 mg-b-20">
	      <nav class="breadcrumb pd-0 mg-0 tx-12">
	        
	        <span class="breadcrumb-item active"><h5>Situation des structures</h5></span>
	      </nav>
	    </div><!-- br-pageheader -->

		<div class="row">
		    <div class="col-md-12">
		    	@include('structures_situation/partials/_search_bar')
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
                			<div class="left-content">
                				




                				<form action="{{ route('download_structure_situation_pdf_path')}}" method="GET">
                            @csrf 

                            <input type="hidden" name="pdf_structure_category_id" value="{{$structure_category_id ?? ''}}">

                            <input type="hidden" name="pdf_town_id" value="{{$town_id ?? ''}}">

                            <input type="hidden" name="pdf_neighborhood_id" value="{{$neighborhood_id ?? ''}}">
                            <a href="route('download_structure_situation_pdf_path')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Télécharger l'état</a>
                            </a>
                        </form>



                				
                			</div>


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
						      
						      <th>Catégorie de structure</th>
						      <th>Nom de la structure</th>
						      <th>Commune</th>
						      <th>Quartier</th>
						    
						    </tr>
						  </thead>

						  <tbody class="structures">
						    @include('structures_situation/partials/_search_result')
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