<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="content" class="required">Structure:</label>
            <select name="structure_id" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                @foreach($structures as $structure)
                    <option value = "{{ $structure->id }}">{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

        

    <div class="col-md-12">   
        <div class="form-group">
            <label for="content" class="required">Contenu:</label>
            <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu" required> {{ $visit_summary->content }}
            </textarea>
        </div>

    </div>
 </div>

 <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="files">Pièces-jointes:</label>
              <input type="file" name="files[]" class="form-control" multiple required>
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div>
