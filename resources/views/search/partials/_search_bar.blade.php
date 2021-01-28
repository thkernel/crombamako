<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('search_doctors_path') }}" method="GET" class="search-form">

    		@csrf

			<div class="row ">
				<div class="col-md-3">
					<div class="form-group">
						<label for="type"> Type </label>
						<select name="type" id="type" class="form-control">
							<option disabled selected value> Sélectionner le type </option>
                            <option value="Médecin">Médecin</option>
                            <option value="Structure">Structure</option>
                        </select>
					</div>
			  	</div>

			  	<div class="col-md-3">
			  		<div class="form-group">
			    		<label for="speciality_id"> Spécialité </label>
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
			            <label for="town_id"> Commune </label>
			            <select name="town_id" id="town_id" class="form-control">
			                <option disabled selected value> Sélectionner une commune </option>
			                @foreach($towns as $town)
			                    <option value = "{{ $town->id }}">{{ $town->name }}</option>
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