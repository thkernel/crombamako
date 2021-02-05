<div class="row">

	<div class="col-md-2">
        <div class="form-group">
        	<label for="civility" class="required">Civilité:</label>
            <select name="civility" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Monsieur" {{ $staff->civility == "Monsieur" ?  'selected' : ''}} >Monsieur</option>
                <option value = "Madame" {{ $staff->civility == "Madame" ?  'selected' : ''}}>Madame</option>
                <option value = "Mademoiselle" {{ $staff->civility == "Mademoiselle" ?  'selected' : ''}}>Mademoiselle</option>
            </select>
        </div>
	</div>

    <div class="col-md-5">
        <div class="form-group">
        	<label for="first_name" class="required">Prénom:</label>
        	<input type="text" class="form-control" placeholder="Prénom"  name="first_name" value="{{  old('first_name') ?? $staff->first_name }}" >
	    {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
        </div><!-- form-group -->
    </div><!-- form-group -->
				
	<div class="col-md-5">
        <div class="form-group">
        	<label for="last_name" class="required">Nom:</label>
        	<input type="text" class="form-control" placeholder="Nom"  name="last_name" value="{{  old('last_name') ?? $staff->last_name }}" >
	    	{!! $errors->first('last_name', '<p class="error">:message</p>') !!}
        </div><!-- form-group -->
    </div><!-- form-group -->
</div>

<div class="row">
	<div class="col-md-4">
        <div class="form-group">
            <label for="speciality_id" class="required">Spécialité:</label>
            <select name="speciality_id" id="speciality_id" class="form-control" required>
                <option {{ $staff->speciality_id  ? '' : 'disabled selected value'}}> 
                @foreach($specialities as $speciality)
                    <option value = "{{ $speciality->id }}" {{ $speciality->id === $staff->speciality_id ?  'selected' : ''}}>{{ $speciality->name }}</option>
                @endforeach
            </select>
        </div>
	</div>
    
	

	<div class="col-md-4">
        <div class="form-group">
            <label for="structure_id" class="required">Structure:</label>
            <select name="structure_id" id="structure_id" class="form-control" required>
                <option {{ $staff->structure_id  ? '' : 'disabled selected value'}}> 
                @foreach($structures as $structure)
                    <option value = "{{ $structure->id }}" {{ $structure->id == $staff->structure_id ?  'selected' : ''}}>{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>
	</div>

	<div class="col-md-4">
        <div class="form-group">
            <label for="service_id" class="required">Service:</label>
            <select name="service_id" id="service_id" class="form-control" required>
                <option {{ $staff->service_id  ? '' : 'disabled selected value'}}> 
                @foreach($services as $service)
                    <option value = "{{ $service->id }}" {{ $service->id == $staff->service_id ?  'selected' : ''}}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
	</div>

</div>

<div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Notes:</label>
                <textarea class="form-control" placeholder="Notes" id="editor" name="description" row="20">
                    {{  old('description') ?? $staff->description }}
                </textarea> 
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div><!-- form-group -->