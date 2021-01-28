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

            <h2>Modification - Activité par structure</h2>

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

   

<form action="{{ route('structure_prestations.update',$structure_prestation->id) }}" method="POST">

    @csrf
    @method('PUT')

  @include("prestations/_form")

     <div class="row">

    

         <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" autocomplete= "off">Modifier</button>
   </div>
  </div>

    </div>

   

</form>
    </div>




</div>
</div>
</div>

@endsection