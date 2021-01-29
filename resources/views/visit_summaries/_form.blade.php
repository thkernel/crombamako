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

        

    <div class="col-md-12">   
        <div class="form-group">
            <label for="description" class="required">Contenu:</label>
            <textarea rows="8" id="editor" name="description" class="form-control" placeholder="Contenu" > {{ $visit_summary->description }}
            </textarea>
        </div>

    </div>
 </div>

 <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="files">Pièces-jointes:</label>
              <input type="file" name="files[]" class="form-control" multiple >
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div>
