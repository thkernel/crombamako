<div class="row">
    
    <div class="col-md-12">   
        <div class="form-group">

            <label for="reference" class="required">Numéro de décision:</label>

                <input type="text" name="reference" value="{{  old('reference') ?? $business_license->reference }}" class="form-control" placeholder="Référence" reauired>

        </div>

         <div class="form-group">

            <label for="decision_date" class="required">Date:</label>

                <input type="text" name="decision_date" value="{{  old('decision_date') ?? $business_license->decision_date }}" class="form-control" placeholder="Année" reauired>

        </div>
  
        

    
        <div class="form-group">
            <label for="description" class="required">Description:</label>
            <textarea rows="8" id="editor" name="description" class="form-control" placeholder="notes" required> {{ $business_license->description }}
            </textarea>
        </div>


         <div class="form-group">

                <input type="file" name="file" class="form-control">

            </div>


    </div>
 </div>