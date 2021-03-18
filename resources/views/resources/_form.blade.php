<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            <label for="title" class="required">Titre:</label>

            <input type="text" name="title" value="{{  old('title') ?? $resource->title }}" class="form-control" placeholder="Titre de la page" reauired>

        </div>

    </div>
     <div class="col-md-12">

    <div class="form-group">
                <label for="content" class="required">Notes:</label>
                <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu">
                    {{  old('content') ?? $resources->content }}
                </textarea>
            </div>
        </div>
        <div class="form-group">

                    <input type="file" name="files[]" class="form-control">

                </div>
</div>