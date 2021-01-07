@extends("layouts.dashboard")

@section("content")
<div class="container main-container">



<div class="br-pagebody mg-b-30">
  <div class="br-section-wrapper">
    <div class="headers mg-b-5">
      

    </div>
    <div class="section-body">
		<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Modification - Utilisateur</h2>

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

   

<form action="{{ route('users.update',$user->id) }}" method="POST">

    @csrf
    @method('PUT')
  

    <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" value= "{{ $user->first_name }}" placeholder="Prénom"  name="first_name" required >
                    </div><!-- form-group -->
                </div><!-- form-group -->
                
                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" value= "{{ $user->last_name }}" placeholder="Nom"  name="last_name" required >
                    </div><!-- form-group -->
                 </div><!-- form-group -->

            <div class="col-md-12">
                <div class="form-group">
                    <select name="role_id" class="form-control" required>
                        <option selected="selected"> {{ $user->role_id }} </option>

                        <option disabled selected value> Sélectionner un rôle </option>
                        @foreach($roles as $role)
                            <option value = "{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        </select>
                </div>
</div>
              <div class="col-md-6">

            
</div>

        <div class="col-md-12">
            <div class="form-group">
              <input type="email" class="form-control" value= "{{ $user->email }}" placeholder="Votre email"  name="email" required >
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
    </div>




</div>
</div>
</div>

@endsection