<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
    	

        <div class="form-group">
            <label for="structure_id" class="required">Structure:</label>
            <select name="structure_id" id="structure_id" class="form-control" required>
                <option {{ $structure_prestation->structure_id  ? '' : 'disabled selected value'}}> 
                @foreach($structures as $structure)
                    <option value = "{{ $structure->id }}" {{ $structure->id == $structure_prestation->structure_id ?  'selected' : ''}}>{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="prestations[]" class="required">Activités:</label>
            <select name="prestations[]" id="prestations[]" class="form-control" required multiple>
                <option {{ $structure_prestation->prestation_id  ? '' : 'disabled selected value'}}> 
                @foreach($prestations as $prestation)
                        <option value = "{{ $prestation->id }}"  @if (selected_prestations($structure_prestation->structure_prestation_items , $prestation->id)) selected @endif>{{ $prestation->name }}</option>
                    @endforeach
            </select>
        </div>

        

    </div>
</div>