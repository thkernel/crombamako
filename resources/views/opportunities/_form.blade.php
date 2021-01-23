
   

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">


            <div class="form-group">
            <label for="opportunity_type_id" class="required">Type:</label>
            <select name="opportunity_type_id" id="opportunity_type_id" class="form-control" required>
                <option {{ $opportunity->opportunity_type_id  ? '' : 'disabled selected value'}}> 
                @foreach($opportunity_types as $opportunity_type)
                    <option value = "{{ $opportunity_type->id }}" {{ $opportunity_type->id === $opportunity->opportunity_type_id ?  'selected' : ''}}>{{ $opportunity_type->name }}</option>
                @endforeach
            </select>
        </div>

            <div class="form-group">

            <label for="name" class="required">Titre:</label>
                <input type="text" name="title" value="{{  old('title') ?? $opportunity->title }}" class="form-control" placeholder="Titre de l'opportunité" reauired>

            </div>

            <div class="form-group">

                <label for="name" class="required">Contenu:</label>

                <textarea class="form-control"  id="editor" row="8" name="content" placeholder="Contenu">

                     {{  old('description') ?? $opportunity->content }}
                    
                </textarea>

            </div>


            <div class="form-group">

                    <input type="file" name="thumbnail" class="form-control">

                </div>

        </div>