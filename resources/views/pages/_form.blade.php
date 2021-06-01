<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            <label for="title" class="required">Titre:</label>

            <input type="text" name="title" value="{{  old('title') ?? $page->title }}" class="form-control" placeholder="Titre de la page" reauired>

        </div>

    </div>
     <div class="col-md-12">

    <div class="form-group">
                <label for="content" class="required">Contenu:</label>
                <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu">
                    {{  old('content') ?? $page->content }}
                </textarea>
            </div>
        </div>
</div>