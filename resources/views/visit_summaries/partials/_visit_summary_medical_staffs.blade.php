<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="doctor" class="required">Médecin:</label>
            

            <select name="doctor" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->doctor == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->doctor == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="nurse" class="required">Infirmier:</label>
           

            <select name="nurse" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->nurse == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->nurse == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="pharmacist" class="required">Pharmacien:</label>
           
            <select name="pharmacist" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->pharmacist == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->pharmacist == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="laboratory_assistant" class="required">Laborantin:</label>
            
            <select name="laboratory_assistant" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->laboratory_assistant == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->laboratory_assistant == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="midwife" class="required">Sage-femme:</label>
            

            <select name="midwife" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->midwife == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->midwife == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="caregiver" class="required">Aide-soignant:</label>
            

            <select name="caregiver" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->caregiver == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->caregiver == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    

</div>