<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="document_type_id" class="required">Type:</label>
            <select name="document_type_id" id="document_type_id" class="form-control" required>
                <option {{ $document_request->document_type_id  ? '' : 'disabled selected value'}}> 
                @foreach($document_types as $document_type)
                    <option value = "{{ $document_type->id }}" {{ $document_type->id === $document_request->document_type_id ?  'selected' : ''}}>{{ $document_type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">   
        <div class="form-group">

            <label for="title" class="required">Titre:</label>

                <input type="text" name="title" value="{{  old('title') ?? $document_request->title }}" class="form-control" placeholder="Titre de la demande" reauired>

        </div>
    </div>

        

    <div class="col-md-12">   
        <div class="form-group">
            <label for="content" class="required">Contenu:</label>
            <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu" required> {{ $document_request->content }}
            </textarea>
        </div>


         <div class="form-group">

                    <input type="file" name="file" class="form-control">

                </div>


    </div>
 </div>