@extends("layouts/auth")

@section("content")
<div class="login-wrapper wd-300 wd-xs-350 pd-25  mb5 mt5 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
        <!-- <span class="tx-normal">{{ config('global.application_name')}}</span> -->
        <img src="/images/Logo-CNOM.png"  alt="Logo-CNOM">
    </div>
        <div class="tx-center mg-b-60">Réinitialiser le mot de passe</div>


        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        @include('layouts/partials/_flash-message')
                    </div><!-- form-group -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="required">Email</label>

                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
                    </div>


                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="required">
                            Mot de passe
                        </label>

                        <input id="password" class="form-control" placeholder="Mot de passe" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="required">
                            Confirmation du mot de passe
                        </label>

                        <input id="password_confirmation" class="form-control" placeholder="Confirmation du mot de passe"
                                            type="password"
                                            name="password_confirmation" required />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Réinitialiser" class="btn btn-primary btn-block">
                    </div>
                </div>
            </div>
        </form>
   </div>
   @endsection