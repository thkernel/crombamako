<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Nouvelle - Opportunité</h2>

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

   

<form action="{{ route('opportunities.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

             <div class="form-group">
                <select name="opportunity_type_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($opportunity_types as $opportunity_type)
                        <option value = "{{ $opportunity_type->id }}">{{ $opportunity_type->name }}</option>
                    @endforeach
                    </select>
            </div>

            <div class="form-group">

                <strong>Titre:</strong>

                <input type="text" name="title" class="form-control" placeholder="Titre de l'opportunité" reauired>

            </div>


        
            

            <div class="form-group">

                <strong>Contenue:</strong>

                <textarea class="form-control"  row="8" name="content" placeholder="Contenu"></textarea>

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