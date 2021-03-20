@extends("layouts/auth")

@section("content")
<div class="login-wrapper wd-300 wd-xs-350 pd-25  mb5 mt5 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">{{ config('global.application_name')}}</span></div>
        <div class="tx-center mg-b-60">Mot de passe oublié</div>

            <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="form-group">
                        @include('layouts/partials/_flash-message')
                    </div><!-- form-group -->
                </div>
            </div>
            <!-- Email Address -->
            <div class="row">
                <div class="col-md-12">

            <div class="form-group">
                <label for="email" class="required">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Saisir votre email" required autofocus>
              
            </div><!-- form-group -->
            <input type="submit" value="Envoyer le lien de réinitialisation" class="btn btn-primary btn-block">


            
              <a href="{{ route('login') }}" class="tx-info tx-12 d-block mg-t-10">Se connecter</a>
            
            </div>
        </div>
        </form>
    @endsection
