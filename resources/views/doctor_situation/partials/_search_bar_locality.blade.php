<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('doctors_situation_locality_path') }}" method="GET" class="search-form">

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
			            <label for="town_id"> Commune </label>
			            <select name="town_id" id="town_id" class="form-control">
			               <option value=""> Sélectionner</option>
			                @foreach($towns as $town)
			                    <option value = "{{ $town->id }}" {{ ($town->id == $town_id ?  ' selected' : '')}}>{{ $town->name }}</option>
			                @endforeach
			            </select>
			        </div>
			  	</div>



			  	<div class="col-md-3">
			  		<div class="form-group">
			            <label for="neighborhood_id"> Quartier </label>
			            <select name="neighborhood_id" id="neighborhood_id" class="form-control">
			                <option value="">Sélectionner</option>
			                @foreach($neighborhoods as $neighborhood)
			                    <option value = "{{ $neighborhood->id }}" {{ ($neighborhood->id == $neighborhood_id ?  ' selected' : '')}}>{{ $neighborhood->name }}</option>
			                @endforeach
			            </select>
			        </div>
			  	</div>

			  	<div class="col-md-3 ">
					<div class="form-group mg-t-20">
			  			<input type="submit" value="RECHERCHER" class= "btn btn-primary btn-block" />
					</div>
				</div>
			  	<!-- 
			  	<div class="col-md-4">
			  		<div class="form-group">
		                <label for="approval">Agréement</label>
		                <select name="approval" class="form-control">
		                    <option value=""> Sélectionner </option>
		                    
		                   
		                    <option value= "Sans agréement">Sans agréement</option>
		                    <option value= "Avec agréement">Avec agréement</option>
		                    
		                </select>
		            </div>
			  	</div>

			  	<div class="col-md-4">
			  		<div class="form-group">
		                <label for="business_license">Licence d'exploitation</label>
		                <select name="business_license" class="form-control">
		                    <option value=""> Sélectionner </option>
		                    
		                    
		                    <option value= "Sans licence">Sans licence</option>
		                    <option value= "Avec licence">Avec licence</option>
		                    
		                </select>
		            </div>
			  	</div>

			  	<div class="col-md-4">
			  	</div>

			  -->

			</div>
			<div class="row">
			 
				

				

				  
		  	</div>
		</form>
				
			</div>
            </div>