<div class="row">
    
    <div class="col-md-12">   
        <div class="form-group">

            <label for="reference" class="required">Référence:</label>

                <input type="text" name="reference" value="{{  old('reference') ?? $approval->reference }}" class="form-control" placeholder="Référence" reauired>

        </div>

         <div class="form-group">

            <label for="year" class="required">Année d'obtention:</label>

                <input type="text" name="year" value="{{  old('year') ?? $approval->year }}" class="form-control" placeholder="Année" reauired>

        </div>
  
        

    
        <div class="form-group">
            <label for="content" class="required">Contenu:</label>
            <textarea rows="8" id="editor" name="content" class="form-control" placeholder="Contenu" required> {{ $approval->content }}
            </textarea>
        </div>


         <div class="form-group">

                <input type="file" name="file" class="form-control">

            </div>


    </div>
 </div>