<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="medical_file" class="required">Dossier médical:</label>
            

            <select name="medical_file" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->medical_file == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->medical_file == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="receipt" class="required">Quittancier:</label>
            

            <select name="receipt" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->receipt == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->receipt == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="prescription_book" class="required">Ordonnanciers:</label>
            

            <select name="prescription_book" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->prescription_book == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->prescription_book == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="consultation_register" class="required">Registre de consultation:</label>
            

            <select name="consultation_register" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->consultation_register == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->consultation_register == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="care_register" class="required">Registre de soins:</label>
            

            <select name="care_register" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->care_register == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->care_register == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="birth_register" class="required">Registre de d'accouchement:</label>
            

            <select name="birth_register" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->birth_register == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->birth_register == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>


    <div class="col-md-4">   
        <div class="form-group">
            <label for="consultation_and_treatment_office" class="required">Cabinet de consultation et de soins:</label>
            

            <select name="consultation_and_treatment_office" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->consultation_and_treatment_office == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->consultation_and_treatment_office == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="medical_clinic" class="required">Clinique médicale:</label>
            
            <select name="medical_clinic" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->medical_clinic == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->medical_clinic == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="surgical_clinic" class="required">Clinique chirurgicale:</label>
            

            <select name="surgical_clinic" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->surgical_clinic == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->surgical_clinic == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="maternity_clinic" class="required">Clinique d'accouchement:</label>
            

            <select name="maternity_clinic" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->maternity_clinic == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->maternity_clinic == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="radiology_practice" class="required">Clinique de radiologie:</label>
            

            <select name="radiology_practice" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->radiology_practice == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->radiology_practice == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    
    


</div>