<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="cleanliness" class="required">Propreté:</label>
            

            <select name="cleanliness" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->cleanliness == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->cleanliness == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="biomedical_waste_management" class="required">Gestion des déchets biomédicaux:</label>
            
            <select name="biomedical_waste_management" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->biomedical_waste_management == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->biomedical_waste_management == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="security_box" class="required">Boites de sécurités:</label>
            

            <select name="security_box" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->security_box == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->security_box == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="tricolor_bins" class="required">Poubelles tricolors:</label>
            

            <select name="tricolor_bins" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->tricolor_bins == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->tricolor_bins == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    


</div>