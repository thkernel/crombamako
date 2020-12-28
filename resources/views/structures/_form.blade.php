<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Nouvelle - Structure</h2>

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

   

<form action="{{ route('structures.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

             <div class="form-group">
                <select name="myselect" class="form-control" required="">
                    <option disabled selected value> Sélectionner </option>
                    @foreach($structure_types as $structure_type)
                        <option value = "{{ $structure_type->id }}">{{ $structure_type->name }}</option>
                    @endforeach
                    </select>
            </div>

            <div class="form-group">

                <strong>Nom:</strong>

                <input type="text" name="name" class="form-control" placeholder="Nom" reauired>

            </div>


            <div class="form-group">

                <strong>Adresse:</strong>

                <input type="text" name="address" class="form-control" placeholder="Adresse" reauired>

            </div>
            <div class="form-group">
                <strong>Ville:</strong>
                <input type="text" name="locality" class="form-control" placeholder="Ville">
            </div>

            <div class="form-group">

                <strong>Téléphone:</strong>

                <input type="text" name="phone" class="form-control" placeholder="Téléphone" reauired>

            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <strong>Site web:</strong>
                <input type="text" name="website" class="form-control" placeholder="Site web">
            </div>

            <div class="form-group">
                <strong>Latitude:</strong>
                <input type="text" name="latitude" class="form-control" placeholder="Latitude">
            </div>

            <div class="form-group">
                <strong>Longitude:</strong>
                <input type="text" name="longitude" class="form-control" placeholder="Longitude">
            </div>

            <div class="form-group">
                <strong>Description:</strong>
                <input type="text_area" name="description" class="form-control" placeholder="Description">
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