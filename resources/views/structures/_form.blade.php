<div class="row">
    <div class="col-md-12">
        <div class="form-group">

            <label for="name" class="required">Nom:</label>
            <input type="text" name="name" class="form-control" placeholder="Nom" value="{{  old('name') ?? $structure->name }}">
                        {!! $errors->first('name', '<p class="error">:message</p>') !!}

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="structure_type_id" class="required">Type:</label>
            <select name="structure_type_id" id="structure_type_id" class="form-control" required>
                <option {{ $structure->structure_type_id  ? '' : 'disabled selected value'}}> 
                @foreach($structure_types as $structure_type)
                    <option value = "{{ $structure_type->id }}" {{ $structure_type->id === $structure->structure_type_id ?  'selected' : ''}}>{{ $structure_type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label for="structure_category_id" class="required">Catégorie:</label>
            <select name="structure_category_id" id="structure_category_id" class="form-control" required>
                <option {{ $structure->structure_category_id  ? '' : 'disabled selected value'}}> Sélectionner </option>
                @foreach($structure_categories as $structure_category)
                    <option value = "{{ $structure_category->id }}" {{ $structure_category->id === $structure->structure_category_id ?  'selected' : ''}}>{{ $structure_category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Adresse:</label>
            <input type="text" name="address" class="form-control" placeholder="Adresse" value="{{  old('address') ?? $structure->address }}">
                        {!! $errors->first('name', '<p class="error">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="locality_id" class="required">Localité:</label>
            <select name="locality_id" class="form-control" required>
                <option {{ $structure->locality_id  ? '' : 'disabled selected value'}}> Sélectionner </option>
                @foreach($localities as $locality)
                    <option value = "{{ $locality->id }}" {{ $locality->id == $structure->locality_id ?  'selected' : ''}}>{{ $locality->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="phone">Téléphone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Téléphone" value="{{  old('phone') ?? $structure->phone }}">
            {!! $errors->first('name', '<p class="error">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="website">Site web:</label>
            <input type="text" name="website" class="form-control" placeholder="Site web" value="{{  old('website') ?? $structure->site }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{  old('email') ?? $structure->email }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="number" name="latitude" class="form-control" placeholder="Latitude" value="{{  old('latitude') ?? $structure->latitude }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="number" name="longitude" class="form-control" placeholder="Longitude" value="{{  old('longitude') ?? $structure->longitude }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control"  id="editor" name="description" placeholder="Description">
               {{  old('description') ?? $structure->description }}
            </textarea>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="description">Logo:</label>
            <input type="file" class="form-control"  name="logo" />

        </div>
    </div>
</div>
