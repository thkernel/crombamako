<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

    	<div class="form-group">
            <label for="town_id" class="required">Commune:</label>
            <select name="town_id" id="town_id" class="form-control" required>
                <option {{ $neighborhood->town_id  ? '' : 'disabled selected value'}}> 
                @foreach($towns as $town)
                    <option value = "{{ $town->id }}" {{ $town->id == $neighborhood->town_id ?  'selected' : ''}}>{{ $town->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">

            <label for="name" class="required">Nom:</label>

            <input type="text" name="name" value="{{  old('name') ?? $neighborhood->name }}" class="form-control" placeholder="Nom" reauired>

        </div>

    </div>
</div>