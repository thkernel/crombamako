<div class="row">
    <div class="col-md-4">   
        <div class="form-group">
            <label for="waiting_room" class="required">Une salle d'attente:</label>
            

            <select name="waiting_room" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->waiting_room == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->waiting_room == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="toilets_number" class="required">Nombre de toilette:</label>
            <input type="number" name="toilets_number" class="form-control" placeholder="Nombre de toilette" value="{{  old('toilets_number') ?? $visit_summary->toilets_number }}">

        </div>

    </div>
    <div class="col-md-4">   
        <div class="form-group">
            <label for="hospital_rooms_number" class="required">Nombre de salle d'hospitalisation:</label>
            <input type="number" name="hospital_rooms_number" class="form-control" placeholder="Nombre de salle d'hospitalisation" value="{{  old('hospital_rooms_number') ?? $visit_summary->hospital_rooms_number }}">

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="resuscitation_room" class="required">Une salle de réanimation:</label>
            

            <select name="resuscitation_room" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->resuscitation_room == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->resuscitation_room == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>


        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="doctor_offices_number" class="required">Nombre de salle de médecin:</label>
            <input type="number" name="doctor_offices_number" class="form-control" placeholder="Nombre de salle de médecin" value="{{  old('doctor_offices_number') ?? $visit_summary->doctor_offices_number }}" >

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="examination_rooms_number" class="required">Nombre de salle d'examens complémentaires:</label>
            <input type="number" name="examination_rooms_number" class="form-control" placeholder="Nombre de salle d'examens complémentaires" value="{{  old('examination_rooms_number') ?? $visit_summary->examination_rooms_number }}">

        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="kitchen" class="required">Une cuisine:</label>
            
            <select name="kitchen" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->kitchen == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->kitchen == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>

    <div class="col-md-4">   
        <div class="form-group">
            <label for="cloakroom" class="required">Un vestiaire:</label>
            

            <select name="cloakroom" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                
                <option value = "Oui" {{ $visit_summary->cloakroom == "Oui" ?  'selected' : ''}} >Oui</option>
                <option value = "Non" {{ $visit_summary->cloakroom == "Non" ?  'selected' : ''}}>Non</option>
                
            </select>



        </div>

    </div>


    <div class="col-md-4">   
        <div class="form-group">
            <label for="treatment_rooms_number" class="required">Nombre de salle de soins:</label>
            <input type="number" name="treatment_rooms_number" class="form-control" placeholder="Nombre de salle de soins" value="{{  old('treatment_rooms_number') ?? $visit_summary->treatment_rooms_number }}">

        </div>

    </div>


</div>