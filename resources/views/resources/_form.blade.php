<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            <label for="title">Titre:</label>

            <input type="text" name="title" value="{{  old('title') ?? $resource->title }}" class="form-control" placeholder="Titre" reauired>

        </div>

    </div>
     <div class="col-md-12">

    <div class="form-group">
                <label for="content" class="required">Notes:</label>
                <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu">
                    {{  old('content') ?? $resource->content }}
                </textarea>
            </div>
            <div class="form-group">
                    <label for="files[]">Fichiers</label>
                    <input type="file" name="files[]" class="form-control">

                </div>
        </div>
        
</div>