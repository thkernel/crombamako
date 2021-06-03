@extends("layouts.dashboard")

@section("content")
<div class="container main-container">



<div class="br-pagebody mg-b-30">
  <div class="br-section-wrapper">
    <div class="headers mg-b-5">
      <h2>Nouveau - Agrément</h2>
      <hr />

    </div>
    <div class="section-body">
		

		<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            
        </div>

       
    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Oups!</strong> Il y a eu des problèmes avec les données saisie.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('approvals.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

  

        @include('approvals/_form')

         <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" autocomplete= "off">Enregistrer</button>
   </div>
  </div>

    </div>

   

</form>
    </div>




</div>
</div>
</div>

@endsection
@include("layouts/partials/_ckeditor")