
    <div class="row">

        <div class="col-md-2">
            <div class="form-group">
                <label for="sex" class="required">Sexe:</label>
                <select name="sex" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    
                    <option value = "Masculin" {{ $admin_profile->sex == "Masculin" ?  'selected' : ''}} >Masculin</option>
                    <option value = "Féminin" {{ $admin_profile->sex == "Féminin" ?  'selected' : ''}}>Féminin</option>
                    
                </select>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="first_name" class="required">Prénom:</label>
                <input type="text" class="form-control" placeholder="Prénom"  name="first_name" value="{{  old('first_name') ?? $admin_profile->first_name }}" >
            {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
        </div><!-- form-group -->
                
        <div class="col-md-5">
            <div class="form-group">
                <label for="last_name" class="required">Nom:</label>
                <input type="text" class="form-control" placeholder="Nom"  name="last_name" value="{{  old('last_name') ?? $admin_profile->last_name }}" >
                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
         </div><!-- form-group -->
    </div>

    

        

   


    

   
