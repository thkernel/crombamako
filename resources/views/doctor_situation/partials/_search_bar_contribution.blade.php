<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('doctors_situation_contribution_path') }}" method="GET" class="search-form">

    		@csrf

			<div class="row ">
				<div class="col-md-3">
			  		<div class="form-group">
			            <label for="structure_category_id"> Spécialité </label>
			            <select name="speciality_id" id="speciality_id" class="form-control">
			                
			                <option value=""> Sélectionner</option>
			                @foreach($specialities as $speciality)
			                    <option value = "{{ $speciality->id }}" {{ ($speciality->id == $speciality_id ?  ' selected' : '')}}>{{ $speciality->name }}</option>
			                @endforeach
			            </select>
			        </div>
			  	</div>

			  	



			  	

			  	<div class="col-md-3">
			  		<div class="form-group">
		                <label for="contribution_status" class="required">Statut</label>
		                <select name="contribution_status" class="form-control" required>
		                    <option value=""> Sélectionner </option>
		                    
		                   
		                    <option value="A jour" {{ ("A jour" == $contribution_status ?  ' selected' : '')}}>A jour</option>
		                    <option value="Non à jour" {{ ("Non à jour" == $contribution_status ?  ' selected' : '')}}>Non à jour</option>
		                    
		                </select>
		            </div>
			  	</div>

			  	<div class="col-md-3">
					<div class="form-group">

					    <label for="year" class="required">Année:</label>
					    


					<select id="year" class="form-control" name="year" required>
						<option value=""> Sélectionner</option>
					    @foreach(years_list() as $year)
					    	<option value="{{ $year}}" {{ ($year == $selected_year ?  ' selected' : '')}} >{{ $year }}</option>
					    @endforeach
					</select>
					 

					</div>
				</div>

			  	<div class="col-md-3 ">
					<div class="form-group mg-t-20">
			  			<input type="submit" value="RECHERCHER" class= "btn btn-primary btn-block" />
					</div>
				</div>
			  	

			  	

			</div>
			
		</form>
				
			</div>
            </div>