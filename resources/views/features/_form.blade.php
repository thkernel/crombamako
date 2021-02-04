<div class="row">
    <div class="col-md-12">

        <div class="form-group">

            <label form="name" class="required">Nom:</label>

            <input type="text" name="name" value="{{  old('name') ?? $feature->name }}" class="form-control" placeholder="Nom" reauired>

        </div>

    </div>

    <div class="col-md-12">


            <div class="form-group">
            <label for="opportunity_type_id" class="required">Type:</label>
            <select name="subject_class" id="subject_class" class="form-control" required>
                <option {{ $feature->subject_class  ? '' : 'disabled selected value'}}> 
                @foreach($models as $model)
                    <option value = "{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>

</div>