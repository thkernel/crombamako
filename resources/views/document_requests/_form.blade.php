<div class="row">

    <!--  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="document_type_id" class="required">Objet:</label>
            <select name="document_type_id" id="document_type_id" class="form-control" required>
                <option {{ $document_request->document_type_id  ? '' : 'disabled selected value'}}> </option>
                @foreach($document_types as $document_type)
                    <option value = "{{ $document_type->id }}" {{ $document_type->id === $document_request->document_type_id ?  'selected' : ''}}>{{ $document_type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

<fieldset class="document-request-structure">
    <legend>Structure</legend>
    <hr />

    <div class="row">
        <div class="col-md-4 structure_category">

            <div class="form-group">
                <label for="structure_category_id" class="required">Catégorie:</label>
                <select name="structure_category_id" id="structure_category_id" class="form-control">
                    <option {{ $document_request->structure_category_id  ? '' : 'disabled selected value'}}> Sélectionner </option>
                    @foreach($structure_categories as $structure_category)
                        <option value = "{{ $structure_category->id }}" {{ $structure_category->id === $document_request->structure_category_id ?  'selected' : ''}}>{{ $structure_category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="structure_name" class="required">Nom de la structure:</label>
                <input type="text" id= "structure_name" class="form-control" placeholder="Nom de la structure"  name="structure_name" value="{{  old('structure_name') ?? $document_request->structure_name }}" >
                
            </div><!-- form-group -->
        </div>

    </div>
</fieldset>

<fieldset>
    <legend>Destinataire</legend>
    <hr />
    <div class="row">
        <div class="col-md-5">   
           

            <div class="form-group">
                <label for="recipient_civility" class="required">Titre:</label>
                <select name="recipient_civility" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    
                    <option value = "Monsieur" {{ $document_request->recipient_civility == "Monsieur" ?  'selected' : ''}} >Monsieur</option>
                    <option value = "Madame" {{ $document_request->recipient_civility == "Madame" ?  'selected' : ''}}>Madame</option>
                     <option value = "Mademoiselle" {{ $document_request->recipient_civility == "Mademoiselle" ?  'selected' : ''}}>Mademoiselle</option>
                    
                </select>
            </div>
            
        </div>

        <div class="col-md-7">
            <div class="form-group">
                <label for="first_name" class="required">Fonction:</label>
                <input type="text" class="form-control" placeholder="Fonction"  name="recipient_function" value="{{  old('recipient_function') ?? $document_request->recipient_function }}" >
                {!! $errors->first('recipient_function', '<p class="error">:message</p>') !!}
            </div><!-- form-group -->
        </div>
    </div>
</fieldset>

<dv class="row">
    <div class="col-md-12">
        
    <!--  -->
    
        

        <div class="form-group">

            <input type="file" name="file" class="form-control">

        </div>
    </div>
</div>