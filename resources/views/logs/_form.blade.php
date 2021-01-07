<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Nouvel - Article</h2>

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

   

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <select name="post_category_id" class="form-control" required>
                    <option disabled selected value> Sélectionner </option>
                    @foreach($post_categories as $post_category)
                        <option value = "{{ $post_category->id }}">{{ $post_category->name }}</option>
                    @endforeach
                    </select>
            </div>

            <div class="form-group">

                <strong>Titre:</strong>

                <input type="text" name="title" class="form-control" placeholder="Titre de l'article" reauired>

            </div>


        
            <div class="form-group">
                <strong>Contenu:</strong>
                <textarea rows="8" name="content" class="form-control" placeholder="Contenu">
                </textarea>
            </div>

            <div class="form-group">

                    <input type="file" name="thumbnail" class="form-control">

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