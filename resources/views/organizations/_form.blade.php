
  

    <div class="row">
      
      <div class="col-md-12">
        <div class="form-group">
          <label for="name" class="required">Nom</label>

          <input type="text" name="name" value="{{  old('name') ?? $organization->name }}" class="form-control" placeholder="Nom" required>
        </div>
     
        <div class="form-group">
         <label for="address">Adresse</label>

          <input type="text" name="address" value="{{  old('address') ?? $organization->address }}" class="form-control" placeholder="Adresse">
        </div>

  
        <div class="form-group">
         <label for="phone_1">Téléphone 1</label>

          <input type="text" name="phone_1" value="{{  old('phone_1') ?? $organization->phone_1 }}" class="form-control" placeholder="Téléphone 1">
        </div>

        <div class="form-group">
         <label for="phone_2">Téléphone 2</label>

          <input type="text" name="phone_2" value="{{  old('phone_2') ?? $organization->phone_2 }}" class="form-control" placeholder="Téléphone 2">
        </div>

        <div class="form-group">
         <label for="fax">Fax</label>

          <input type="text" name="fax" value="{{  old('fax') ?? $organization->fax }}" class="form-control" placeholder="Fax">
        </div>

        <div class="form-group">
         <label for="po_box">BP</label>

          <input type="text" name="po_box" value="{{  old('po_box') ?? $organization->po_box }}" class="form-control" placeholder="BP">
        </div>

        <div class="form-group">
         <label for="city">Ville</label>

          <input type="text" name="city" value="{{  old('city') ?? $organization->city }}" class="form-control" placeholder="Ville">
        </div>

         <div class="form-group">
         <label for="country">Pays</label>

          <input type="text" name="country" value="{{  old('country') ?? $organization->country }}" class="form-control" placeholder="Pays">
        </div>

        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="number" name="latitude" class="form-control" placeholder="Latitude" value="{{  old('latitude') ?? $organization->latitude }}" step="any">
        </div>
    
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="number" name="longitude" class="form-control" placeholder="Longitude" value="{{  old('longitude') ?? $organization->longitude }}" step="any">
        </div>
   
        <div class="form-group">

         <label for="email">Email</label>

          <input type="email" name="email" value="{{  old('email') ?? $organization->email }}" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">

         <label for="website">Site web</label>

          <input type="text" name="website" value="{{  old('website') ?? $organization->website }}" class="form-control" placeholder="Site web">
        </div>
      </div>
    </div>

        

   
   

    
  
  