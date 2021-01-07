

   

 <div class="form-group">

    <label for="name" class="required">Nom:</label>

    <input type="text" id="name" name="name" class="form-control" placeholder="Nom" value="{{  old('name') ?? $structure_type->name }}" >
    {!! $errors->first('name', '<p class="error">:message</p>') !!}

</div>