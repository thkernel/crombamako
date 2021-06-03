<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="director" class="required">Directeur:</label>
            

            <select name="director" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->director == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->director == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="secretory" class="required">Secrétaire:</label>
           
            <select name="secretory" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->secretory == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->secretory == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>

        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="accounting" class="required">Comptable:</label>
            

            <select name="accounting" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->accounting == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->accounting == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    

   
    

    

</div>