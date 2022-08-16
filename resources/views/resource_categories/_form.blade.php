
<div class="col-md-12">

    <div class="form-group">

        <label for="name">Nom:</label>

        <input type="text" id="name" name="name" class="form-control" placeholder="Nom" value="{{  old('name') ?? $resource_category->name }}" >
    {!! $errors->first('name', '<p class="error">:message</p>') !!}

    </div>

</div>
