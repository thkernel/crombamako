
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            

            <div class="form-group">
            <label for="post_category_id" class="required">Catégorie:</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
                <option {{ $post->post_category_id  ? '' : 'disabled selected value'}}> 
                @foreach($post_categories as $post_category)
                    <option value = "{{ $post_category->id }}" {{ $post_category->id === $post->post_category_id ?  'selected' : ''}}>{{ $post_category->name }}</option>
                @endforeach
            </select>
        </div>



            <div class="form-group">

            <label for="title" class="required">Titre:</label>

                <input type="text" name="title" value="{{  old('title') ?? $post->title }}" class="form-control" placeholder="Titre de l'article" reauired>

            </div>


        
            <div class="form-group">
                <label for="content" class="required">Contenu:</label>
                <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu">
                    {{  old('content') ?? $post->content }}
                </textarea>
            </div>

            <div class="form-group">

                    <input type="file" name="thumbnail" class="form-control">

                </div>

            
        </div>
    </div>