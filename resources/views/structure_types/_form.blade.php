<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Nouveau - Type de structure</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('structure_types.index') }}"> Retour</a>

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

   

<form action="{{ route('structure_types.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nom:</strong>

                <input type="text" name="name" class="form-control" placeholder="Nom" reauired>

            </div>

        </div>
<!--
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Detail:</strong>

                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>

            </div>

        </div>
-->
         <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" autocomplete= "off">Enregistrer</button>
   </div>
  </div>

    </div>

   

</form>