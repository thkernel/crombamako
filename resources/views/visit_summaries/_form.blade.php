<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
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

    
 </div>

 <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="files">Pièces-jointes:</label>
              <input type="file" name="files[]" class="form-control" multiple >
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div>
