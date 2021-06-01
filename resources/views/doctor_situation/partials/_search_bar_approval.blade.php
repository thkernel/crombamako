<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('doctors_situation_approval_path') }}" method="GET" class="search-form">

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
		                <label for="approval">Agréement</label>
		                <select name="approval" class="form-control">
		                    <option value=""> Sélectionner </option>
		                    
		                   
		                    <option value="Sans agréement" {{ ("Sans agréement" == $approval ?  ' selected' : '')}}>Sans agréement</option>
		                    <option value="Avec agréement" {{ ("Avec agréement" == $approval ?  ' selected' : '')}}>Avec agréement</option>
		                    
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