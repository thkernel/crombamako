<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="sterilization_device" class="required">Un appareil de stérilisation:</label>
            

            <select name="sterilization_device" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->sterilization_device == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->sterilization_device == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="oxygen_source" class="required">Une source d'oxygène:</label>
            
            <select name="oxygen_source" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->oxygen_source == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->oxygen_source == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="communication_source" class="required">Une source de communication:</label>
            
            <select name="communication_source" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->communication_source == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->communication_source == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="freezer_or_fridge" class="required">Réfrigérateur / congélateur:</label>
            

            <select name="freezer_or_fridge" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->freezer_or_fridge == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->freezer_or_fridge == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="generator" class="required">Un groupe électrogène:</label>
           

            <select name="generator" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->generator == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->generator == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    

</div>