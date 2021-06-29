<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="login" class="required">Login:</label>
          <input type="text" class="form-control" value= "{{  old('login') ?? $user->login }}" placeholder="login"  name="login" required readonly="true">
        </div><!-- form-group -->
    </div><!-- form-group -->

    <div class="col-md-12">
        

        <div class="form-group">
            <label for="role_id" class="required">Rôle:</label>
            <select name="role_id" id="role_id" class="form-control" required readonly="true">
                <option {{ $user->role_id  ? '' : 'disabled selected value'}}> 
                @foreach($roles as $role)
                    <option value = "{{ $role->id }}" {{ $role->id == $user->role_id ?  'selected' : ''}}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>


    </div>
    
    <div class="col-md-12">
        <div class="form-group">
        <label for="email" class="required">Email:</label>
          <input type="email" class="form-control" value= "{{  old('login') ?? $user->email }}" placeholder="Votre email"  name="email" required readonly="true">
        </div><!-- form-group -->
    </div><!-- form-group -->
        <div class="col-md-12">

            <div class="form-group">
                <label for="password" class="required">Mot de passe:</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
              
            </div><!-- form-group -->
        </div><!-- form-group -->

        <div class="col-md-12">
            <div class="form-group">
                <label for="password_confirmation" class="required">Confirmation du mot de passe:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmation du mot de passe">
            </div><!-- form-group -->
        </div><!-- form-group -->
    </div>
</div>