<div class="card">
  <div class="card-body text-center">
		<form action="{{ route('structures_situation_path') }}" method="GET" class="search-form">

    		@csrf

			<div class="row ">
				<div class="col-md-3">
			  		<div class="form-group">
			            <label for="structure_category_id"> Catégorie </label>
			            <select name="structure_category_id" id="structure_category_id" class="form-control">
			                
			                <option value=""> Sélectionner</option>
			                @foreach($structure_categories as $structure_category)
			                    <option value = "{{ $structure_category->id }}" {{ ($structure_category->id == $structure_category_id ?  ' selected' : '')}}>{{ $structure_category->name }}</option>
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

				

				  
				  </div>
				</form>
				
			</div>
            </div>