<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('doctors_situation_business_license_path') }}" method="GET" class="search-form">

    		@csrf

			<div class="row ">
				<div class="col-md-4">
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

			  	



			  	

			  	<div class="col-md-4">
			  		<div class="form-group">
		                <label for="business_license">Licence d'exploitation</label>
		                <select name="business_license" class="form-control">
		                    <option value=""> Sélectionner </option>
		                    
		                   
		                    <option value="Sans licence" {{ ("Sans licence" == $business_license ?  ' selected' : '')}}>Sans licence</option>
		                    <option value="Avec licence" {{ ("Avec licence" == $business_license ?  ' selected' : '')}}>Avec licence</option>
		                    
		                </select>
		            </div>
			  	</div>

			  	<div class="col-md-4 ">
					<div class="form-group mg-t-20">
			  			<input type="submit" value="RECHERCHER" class= "btn btn-primary btn-block" />
					</div>
				</div>
			  	

			  	

			</div>
			
		</form>
				
			</div>
            </div>