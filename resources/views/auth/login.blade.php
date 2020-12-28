@extends("layouts/auth")

@section("content")


    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span>e<span class="tx-info">Santé</span> <span class="tx-normal">]</span></div>
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

        <div class="mg-t-60 tx-center">Vous n'avez pas encore de compte? <a href="" class="tx-info">S'inscrire</a></div>
      

@endsection