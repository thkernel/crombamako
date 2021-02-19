<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
    	

        <div class="form-group">
            <label for="structure_id" class="required">Structure:</label>
            <select name="structure_id" id="structure_id" class="form-control" required>
                <option {{ $structure_service->structure_id  ? '' : 'disabled selected value'}}> 
                @foreach($structures as $structure)
                    <option value = "{{ $structure->id }}" {{ $structure->id == $structure_service->structure_id ?  'selected' : ''}}>{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="services[]" class="required">Services:</label>
            <select name="services[]" id="services[]" class="form-control" required multiple>
                <option {{ $structure_service->service_id  ? '' : 'disabled selected value'}}> 
                @foreach($services as $service)
                        <option value = "{{ $service->id }}"  @if (selected_services($structure_service->structure_service_items , $service->id)) selected @endif>{{ $service->name }}</option>
                    @endforeach
            </select>
        </div>

        

    </div>
</div>