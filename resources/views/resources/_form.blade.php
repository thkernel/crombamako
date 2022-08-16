<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            <label for="title" class="required">Titre:</label>

            <input type="text" name="title" value="{{  old('title') ?? $resource->title }}" class="form-control" placeholder="Titre" required>

        </div>

    </div>
    <div class="col-md-12">

        <div class="form-group">
            <label for="resource_category_id" class="required">Catégorie:</label>
            <select name="resource_category_id" id="resource_category_id" class="form-control" required>
                <option {{ $resource->resource_category_id  ? '' : 'disabled selected value'}}> 
                @foreach($resource_categories as $resource_category)
                    <option value = "{{ $resource_category->id }}" {{ $resource_category->id === $resource->resource_category_id ?  'selected' : ''}}>{{ $resource_category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
     <div class="col-md-12">

    <div class="form-group">
                <label for="content">Notes:</label>
                <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu">
                    {{  old('content') ?? $resource->content }}
                </textarea>
            </div>
            <div class="form-group">
                    <label for="file" class="required">Veuillez joindre le fichier</label>
                    <input type="file" name="file" class="form-control" required="">

                </div>
        </div>
        
</div>