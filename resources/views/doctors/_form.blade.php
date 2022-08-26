
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="reference_cnom" class="required">Réf. CNOM:</label>
                <input type="text" class="form-control" placeholder="Réf. CNOM"  name="reference_cnom" value="{{  old('reference_cnom') ?? $doctor->doctor_order->reference_cnom }}" >
            
            </div><!-- form-group -->
        </div>

        

        <div class="col-md-3">
            <div class="form-group">
                <label for="first_name" class="required">Prénom:</label>
                <input type="text" class="form-control" placeholder="Prénom"  name="first_name" value="{{  old('first_name') ?? $doctor->first_name }}" >
            {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
        </div><!-- form-group -->
                
        <div class="col-md-3">
            <div class="form-group">
                <label for="last_name" class="required">Nom:</label>
                <input type="text" class="form-control" placeholder="Nom"  name="last_name" value="{{  old('last_name') ?? $doctor->last_name }}" >
                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
         </div><!-- form-group -->

         <div class="col-md-3">
            <div class="form-group">
                <label for="sex" class="required">Sexe:</label>
                <select name="sex" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    
                    <option value = "Masculin" {{ $doctor->sex == "Masculin" ?  'selected' : ''}} >Masculin</option>
                    <option value = "Féminin" {{ $doctor->sex == "Féminin" ?  'selected' : ''}}>Féminin</option>
                    
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 ">
            <div class="form-group">
                <label for="is_specialist" class="required"> Spécialiste</label><br>
                <select name="is_specialist" id="is_specialist" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    
                    <option value = "Oui" {{ $doctor->is_specialist == "Oui" ?  'selected' : ''}} >Oui</option>
                    <option value = "Non" {{ $doctor->is_specialist == "Non" ?  'selected' : ''}}>Non</option>
                    
                </select>
            </div>
        </div>

        <div class="col-md-4 speciality">
            

            <div class="form-group">
                <label for="speciality_id" class="required">Spécialité:</label>
                <select name="speciality_id" id="speciality_id" class="form-control">
                    <option {{ $doctor->speciality_id  ? '' : 'disabled selected value'}}> 
                    @foreach($specialities as $speciality)
                        <option value = "{{ $speciality->id }}" {{ $speciality->id == $doctor->speciality_id ?  'selected' : ''}}>{{ $speciality->name }}</option>
                    @endforeach
                </select>
            </div>


        </div>
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="town_id" class="required">Commune:</label>
                <select name="town_id" class="form-control" required>
                    <option {{ $doctor->town_id  ? '' : 'disabled selected value'}}> 
                    @foreach($towns as $town)
                        <option value = "{{ $town->id }}" {{ $town->id == $doctor->town_id ?  'selected' : ''}}>{{ $town->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

        

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="neighborhood_id">Quartier:</label>
                

                <select name="neighborhood_id" class="form-control" required>
                    <option {{ $doctor->neighborhood_id  ? '' : 'disabled selected value'}}> 
                    @foreach($neighborhoods as $neighborhood)
                        <option value = "{{ $neighborhood->id }}" {{ $neighborhood->id == $doctor->neighborhood_id ?  'selected' : ''}}>{{ $neighborhood->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="structure_id">Structure:</label>
                <select name="structure_id" class="form-control">
                    <option {{ $doctor->structure_id  ? '' : 'disabled selected value'}}> 
                    @foreach($structures as $structure)
                        <option value = "{{ $structure->id }}" {{ $structure->id == $doctor->structure_id ?  'selected' : ''}}>{{ $structure->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="service_id">Service:</label>
                <select name="service_id" id="service_id" class="form-control">
                    <option {{ $doctor->service_id  ? '' : 'disabled selected value'}}> 
                    @foreach($services as $service)
                        <option value = "{{ $service->id }}" {{ $service->id == $doctor->service_id ?  'selected' : ''}}>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


    
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="required">Email:</label>
              <input type="email" class="form-control" placeholder="Votre email"  name="email" value="{{  old('email') ?? $doctor->email }}"  required >
            </div><!-- form-group -->
        </div><!-- form-group -->

        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="required">Téléphone:</label>
                <input type="tel" id="phone" class="form-control" placeholder="Téléphone"  name="phone" value="{{  old('phone') ?? $doctor->phone }}" >
                {!! $errors->first('phone', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
         </div><!-- form-group -->
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address">Adresse (Rue, porte etc...):</label>
                <input type="text" class="form-control" placeholder="Adresse (Rue, porte etc...)"  name="address" value="{{  old('address') ?? $doctor->address }}" >
                {!! $errors->first('address', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
         </div><!-- form-group -->

        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Notes:</label>
                <textarea class="form-control" placeholder="Notes" id="editor" name="description" row="20">
                    {{  old('description') ?? $doctor->description }}
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
