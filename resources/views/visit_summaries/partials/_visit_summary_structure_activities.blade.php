<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="general_consultation" class="required">Consultation générale:</label>
            

            <select name="general_consultation" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->general_consultation == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->general_consultation == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="specialist_consultation" class="required">Consultation spécialisée:</label>
            

            <select name="specialist_consultation" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->specialist_consultation == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->specialist_consultation == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="cpn" class="required">CPN:</label>
            

            <select name="cpn" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->cpn == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->cpn == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="labor_room" class="required">Salle d'accouchement:</label>
            

            <select name="labor_room" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->labor_room == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->labor_room == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="general_ultrasound" class="required">Echographie générale:</label>
            

            <select name="general_ultrasound" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->sgeneral_ultrasound == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->general_ultrasound == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="specialized_ultrasound" class="required">Echographie spécialisée:</label>
            

            <select name="specialized_ultrasound" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->specialized_ultrasound == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->specialized_ultrasound == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>




    <div class="col-md-4">   
        <div class="form-group">
            <label for="digestive_endoscopy" class="required">Endoscopie digestive:</label>
            

            <select name="digestive_endoscopy" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->digestive_endoscopy == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->digestive_endoscopy == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="surgery_block" class="required">Bloc de chirurgie:</label>
            
            <select name="surgery_block" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->surgery_block == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->surgery_block == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="radiology_room" class="required">Salle de radiologie:</label>
            
            <select name="radiology_room" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->radiology_room == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->radiology_room == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="biomedical_laboratory" class="required">Laboratoire biomédical:</label>
            

            <select name="biomedical_laboratory" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->biomedical_laboratory == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->biomedical_laboratory == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>

    
    


</div>