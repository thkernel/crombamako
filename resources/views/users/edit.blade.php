@extends("layouts.dashboard")

@section("content")
<div class="container main-container">



    <div class="br-pagebody mg-b-30">
        <div class="br-section-wrapper">
            <div class="headers mg-b-5">
              <h2>Modification - Utilisateur</h2>
              <hr />
            </div>

            <div class="section-body">
            	<div class="row">

                    <div class="col-lg-12 margin-tb">

                        <div class="pull-left">
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
                  

                    @include('users/_form')
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Modifier" class="btn btn-info btn-block">
                            </div><!-- form-group --> 
                        </div><!-- form-group --> 
                    </div><!-- form-group --> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection