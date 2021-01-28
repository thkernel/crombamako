
	<div class="row">

		<div class="col-md-2">
	        <div class="form-group">
	        	<label for="civility" class="required">Civilité:</label>
                <select name="civility" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    <option value = "Monsieur">Monsieur</option>
                    <option value = "Madame">Madame</option>
                    <option value = "Mademoiselle">Mademoiselle</option>
                </select>
            </div>
		</div>

        <div class="col-md-5">
            <div class="form-group">
            	<label for="first_name" class="required">Prénom:</label>
	        	<input type="text" class="form-control" placeholder="Prénom"  name="first_name" value="{{  old('first_name') ?? $subscription_request->first_name }}" >
		    {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
	        </div><!-- form-group -->
	    </div><!-- form-group -->
				
		<div class="col-md-5">
	        <div class="form-group">
	        	<label for="last_name" class="required">Nom:</label>
	        	<input type="text" class="form-control" placeholder="Nom"  name="last_name" value="{{  old('last_name') ?? $subscription_request->last_name }}" >
		    	{!! $errors->first('last_name', '<p class="error">:message</p>') !!}
	        </div><!-- form-group -->
	     </div><!-- form-group -->
	</div>

	<div class="row">
		<div class="col-md-3">
	        <div class="form-group">
	        	<label for="speciality_id" class="required">Spécialité:</label>
                <select name="speciality_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($specialities as $speciality)
                        <option value = "{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
	            <label for="service_id" class="required">Service:</label>
	            <select name="service_id" id="service_id" class="form-control" required>
	                <option {{ $subscription_request->service_id  ? '' : 'disabled selected value'}}> 
	                @foreach($services as $service)
	                    <option value = "{{ $service->id }}" {{ $service->id === $subscription_request->service_id ?  'selected' : ''}}>{{ $service->name }}</option>
	                @endforeach
	            </select>
	        </div>
	    </div>

	    <div class="col-md-3">
            <div class="form-group">
             	<label for="town_id" class="required">Commune:</label>
                <select name="town_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($towns as $town)
                        <option value = "{{ $town->id }}">{{ $town->name }}</option>
                    @endforeach
                </select>
            </div>
		</div>
		<div class="col-md-3">
            <div class="form-group">
             	<label for="neighborhood_id" class="required">Quartier:</label>
                <select name="neighborhood_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($neighborhoods as $neighborhood)
                        <option value = "{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
                    @endforeach
                </select>
            </div>
		</div>

		<div class="col-md-3">
            <div class="form-group">
             	<label for="structure_id">Structure:</label>
                <select name="structure_id" class="form-control">
                    <option disabled selected value> Sélectionner </option>
                    @foreach($structures as $structure)
                        <option value = "{{ $structure->id }}">{{ $structure->name }}</option>
                    @endforeach
                </select>
            </div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
	        <div class="form-group">
	        	<label for="address" class="required">Adresse:</label>
	        	<input type="text" class="form-control" placeholder="Adresse"  name="address" value="{{  old('address') ?? $subscription_request->address }}" >
		    	{!! $errors->first('address', '<p class="error">:message</p>') !!}
	        </div><!-- form-group -->
	     </div><!-- form-group -->

	     <div class="col-md-6">
	        <div class="form-group">
	        	<label for="phone" class="required">Téléphone:</label>
	        	<input type="text" class="form-control" placeholder="Téléphone"  name="phone" value="{{  old('phone') ?? $subscription_request->phone }}" >
		    	{!! $errors->first('phone', '<p class="error">:message</p>') !!}
	        </div><!-- form-group -->
	     </div><!-- form-group -->
	</div>


	<div class="row">

 		<div class="col-md-12">
	        <div class="form-group">
	        	<label for="email" class="required">Email:</label>
	          <input type="email" class="form-control" placeholder="Votre email"  name="email" required >
	        </div><!-- form-group -->
	    </div><!-- form-group -->
	</div>

	<div class="row">
		<div class="col-md-12">
	        <div class="form-group">
	        	<label for="description">Notes:</label>
	        	<textarea class="form-control" placeholder="Notes" id="editor" name="description" row="20">
	          		{{  old('description') ?? $subscription_request->description }}
	        	</textarea> 
	        </div><!-- form-group -->
	    </div><!-- form-group -->
	</div><!-- form-group -->

	<div class="row">
 		<div class="col-md-12">
	        <div class="form-group">
	        	<label for="files">Pièces-jointes:</label>
	          <input type="file" name="files[]" class="form-control" multiple>
	        </div><!-- form-group -->
	    </div><!-- form-group -->
	</div>
