<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Nouveau - Médecin</h2>

        </div>

        <div class="pull-right">


        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <select name="civility" class="form-control" required>
                            <option disabled selected value> Civilité </option>
                            <option value = "Monsieur">Monsieur</option>
                            <option value = "Madame">Madame</option>
                            <option value = "Mademoiselle">Mademoiselle</option>
                            
                        </select>
                    </div>
                </div><!-- form-group -->
                <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Prénom"  name="first_name" required >
                    </div><!-- form-group -->
                 </div><!-- form-group -->
                <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Nom"  name="last_name" required >
                    </div><!-- form-group -->
                 </div><!-- form-group -->

            <div class="col-md-6">
                <div class="form-group">
                    <select name="locality_id" class="form-control" required>
                        <option disabled selected value> Sélectionner une localité </option>
                        @foreach($localities as $locality)
                            <option value = "{{ $locality->id }}">{{ $locality->name }}</option>
                        @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select name="speciality_id" class="form-control" required>
                        <option disabled selected value> Sélectionner une spécialité </option>
                        @foreach($specialities as $speciality)
                            <option value = "{{ $speciality->id }}">{{ $speciality->name }}</option>
                        @endforeach
                        </select>
                </div>
            
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Adresse"  name="address" required >
                    </div><!-- form-group -->
                 </div><!-- form-group -->
                 <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Téléphone"  name="phone" required >
                    </div><!-- form-group -->
                 </div><!-- form-group -->

        <div class="col-md-12">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Votre email"  name="email" required >
            </div><!-- form-group -->
        </div><!-- form-group -->
        <div class="col-md-12">

            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
              
            </div><!-- form-group -->
        </div><!-- form-group -->

        <div class="col-md-12">
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmation du mot de passe">
            </div><!-- form-group -->
        </div><!-- form-group -->
        <div class="col-md-12">
            <div class="form-group">
            <input type="submit" value="S'inscrire" class="btn btn-info btn-block">
                </div><!-- form-group --> 
            </div><!-- form-group --> 
            </div><!-- form-group --> 
        </form>