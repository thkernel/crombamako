<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="content" class="required">Type:</label>
            <select name="certificate_type_id" class="form-control" required>
                <option disabled selected value> Sélectionner </option>
                @foreach($certificate_types as $certificate_type)
                    <option value = "{{ $certificate_type->id }}">{{ $certificate_type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

        

    <div class="col-md-12">   
        <div class="form-group">
            <label for="content" class="required">Contenu:</label>
            <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu" required> {{ $certificate_request->content }}
            </textarea>
        </div>

    </div>
 </div>