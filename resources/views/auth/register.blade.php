@extends("layouts/auth")

@section("content")

<div class="login-wrapper wd-600 wd-xs-550 pd-25  mb5 mt5 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">{{ config('global.application_name')}}</span></div>
        <div class="tx-center mg-b-60">Veuillez vous inscrire gratuitement</div>
         <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">

            	<div class="col-md-6">
		            <div class="form-group">
			          <input type="text" class="form-control" placeholder="Prénom"  name="first_name" required >
			        </div><!-- form-group -->
			    </div><!-- form-group -->
				
				<div class="col-md-6">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Nom"  name="last_name" required >
			        </div><!-- form-group -->
			     </div><!-- form-group -->

			<div class="col-md-6">
		        <div class="form-group">
	                <select name="speciality_id" class="form-control" required>
	                    <option disabled selected value> Sélectionner </option>
	                    @foreach($specialities as $speciality)
	                        <option value = "{{ $speciality->id }}">{{ $speciality->name }}</option>
	                    @endforeach
	                    </select>
	            </div>
</div>
	          <div class="col-md-6">

             <div class="form-group">
                <select name="locality_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($localities as $locality)
                        <option value = "{{ $locality->id }}">{{ $locality->name }}</option>
                    @endforeach
                    </select>
            </div>
</div>

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

        <div class="mg-t-10 tx-center">Avez-vous déjà un compte? <a href="{{ route('login') }}" class="tx-info">Se connecter</a></div>
      
		</div>
@endsection