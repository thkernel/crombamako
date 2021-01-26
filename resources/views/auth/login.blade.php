@extends("layouts/auth")

@section("content")
<div class="login-wrapper wd-300 wd-xs-350 pd-25  mb5 mt5 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">{{ config('global.application_name')}}</span></div>
        <div class="tx-center mg-b-60">Veuillez vous connecter</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
	        <div class="form-group">
	          <input type="email" class="form-control" placeholder="Votre email"  name="email" required >
	        </div><!-- form-group -->
	        <div class="form-group">
	          <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
	          @if (Route::has('password.request'))
	          <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Mot de passe oublié?</a>
	          @endif
	        </div><!-- form-group -->
	        <input type="submit" value="Se connecter" class="btn btn-info btn-block">
	        	
	        
	    </form>
	    <!--
        <div class="mg-t-60 tx-center">Vous n'avez pas encore de compte? <a href="{{ route('register') }}" class="tx-info">S'inscrire</a></div>
      </div>
      -->

@endsection