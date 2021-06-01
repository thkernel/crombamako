<div class="form-group">

    <label for="name" class="required">Nom:</label>
    <input type="text" id= "name" name="name" class="form-control" value="{{  old('name') ?? $role->name }}"placeholder="Nom" >
    {!! $errors->first('name', '<p class="error">:message</p>') !!}

</div>