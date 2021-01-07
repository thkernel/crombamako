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
		       

		            <h2>Modification - Préinscription </h2>
                <hr />

		      
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

   

<form action="{{ route('subscription_requests.store') }}" method="POST" enctype="multipart/form-data">

@csrf

  

    
            @include('subscription_requests/_form')

        
    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">

          <div class="form-group text-right">
              <button type="submit" class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" autocomplete= "off">Envoyer</button>
          </div>
        </div>

    </div>

   

</form>


    </div>




</div>
</div>
</div>



@endsection

