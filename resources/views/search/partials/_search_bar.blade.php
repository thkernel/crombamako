<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('search_doctors_path') }}" method="GET" class="search-form">

    		@csrf

			<div class="row ">
				<div class="col-md-3">
					<div class="form-group">
						<select name="type" id="type" class="form-control">
							<option disabled selected value> Sélectionner </option>
                            <option value="Médecin">Médecin</option>
                            <option value="Structure">Structure</option>
                        </select>
					</div>
			  	</div>

			  	<div class="col-md-3">
			  		<div class="form-group">
			    
			            <select name="speciality_id" id="speciality_id" class="form-control">
			                <option disabled selected value> Sélectionner une spécialité </option>
			                @foreach($specialities as $speciality)
			                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
			                @endforeach
			            </select>
			        </div>
			  	</div>
			 

			  	<div class="col-md-3">
			  		<div class="form-group">
			            
			            <select name="locality_id" id="speciality_id" class="form-control">
			                <option disabled selected value> Sélectionner une localité </option>
			                @foreach($localities as $locality)
			                    <option value = "{{ $locality->id }}">{{ $locality->name }}</option>
			                @endforeach
			            </select>
			        </div>
			  	</div>
						<div class="col-md-3">
							<div class="form-group">
					  			<input type="submit" value="RECHERCHER" class= "btn btn-success btn-block" />
							</div>
						</div>

				

				  
				  </div>
				</form>
				
			</div>
            </div>