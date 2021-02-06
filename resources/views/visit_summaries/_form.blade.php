<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="visit_date" class="required">Date de  visite:</label>
             <input type="date" name="visit_date" class="form-control" placeholder="Consultation spécialisée" value="{{  old('visit_date') ?? $visit_summary->visit_date }}" >
            
        </div>

    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="visit_hour" class="required">Heure de visite:</label>
             <input type="time" name="visit_hour" class="form-control" placeholder="Heure de visite" value="{{  old('visit_hour') ?? $visit_summary->visit_hour }}" >
            
        </div>

    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="structure_id" class="required">Structure:</label>
            <select name="structure_id" id="structure_id" class="form-control" required>
                <option {{ $visit_summary->structure_id  ? '' : 'disabled selected value'}}> 
                @foreach($structures as $structure)
                    <option value = "{{ $structure->id }}" {{ $structure->id == $visit_summary->structure_id ?  'selected' : ''}}>{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
 </div>
   
        
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="visit_summary_teams[]" class="required">L'équipe de visite:</label>
                <select name="visit_summary_teams[]" id="visit_summary_teams[]" class="form-control" required multiple>
                    <option {{ $visit_summary->structure_id  ? '' : 'disabled selected value'}}> 
                    @foreach($doctors as $doctor)
                        <option value = "{{ $doctor->id }}" {{ $doctor->id == $visit_summary->structure_id ?  'selected' : ''}}>{{ $doctor->full_name_with_reference }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
   


        
    <fieldset>
        <legend>Bâtiment</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_buildings")
    </fieldset>

    <fieldset>
        <legend>Les matériels</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_materials")
    </fieldset>

    <fieldset>
        <legend>Le personnel médical et para médical</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_medical_staffs")
    </fieldset>

    <fieldset>
        <legend>Le personnel non médical en place</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_non_medical_staffs")
    </fieldset>

    <fieldset>
        <legend>Les recommandations de la DRS</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_recommendations")
    </fieldset>

    <fieldset>
        <legend>Les activités de la structure</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_structure_activities")
    </fieldset>

    <fieldset>
        <legend>Observations</legend>
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_observations")
    </fieldset>

    <fieldset>
       
        <hr />
        
        @include("visit_summaries/partials/_visit_summary_others")
    </fieldset>



    
 </div>

 <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="files">Pièces-jointes:</label>
              <input type="file" name="files[]" class="form-control" multiple >
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div>
