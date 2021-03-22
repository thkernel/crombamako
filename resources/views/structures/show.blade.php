@extends("layouts.front")

@section("content")
	

<div class="container main-container">
  <div class="card">
    <div class="card-header">
        <div class="pull-left">
            <strong>Informations</strong>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 responsive-img">
              {!! structure_logo($structure, '', '') !!}

            </div>
            <div class="col-md-4">
                <table>
                    <tbody>
                        
                         <tr>
                            <td class="table-td-title">Nom:</td><td class="table-td-value">{{ $structure->name}}</td>
                        </tr>
                       
                         <tr>
                            <td class="table-td-title">Catégorie:</td class="table-td-value"><td>{{ $structure->structure_category ? $structure->structure_category->name : ''}}</td>
                        </tr>

                        <tr>
                            <td class="table-td-title">Adresse:</td class="table-td-value"><td>{{ $structure->address}}</td>
                        </tr>

                        <tr>
                            <td class="table-td-title">Commune:</td class="table-td-value"><td>{{ $structure->town ? $structure->town->name : ''}}</td>
                        </tr>

                        <tr>
                            <td class="table-td-title">Quartier:</td class="table-td-value"><td>{{ $structure->neighborhood ? $structure->neighborhood->name :''}}</td>
                        </tr>

                        <tr>
                            <td class="table-td-title">Téléphone:</td class="table-td-value"><td>{{ $structure->phone}}</td>
                        </tr>
                        <tr>
                            <td class="table-td-title">Email:</td class="table-td-value"><td>{{ $structure->email}}</td>
                        </tr>
                       
                       

                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <p>
                    <div id="map"></div>
                </p>
            </div>
            
        </div>
    </div>
  </div>

  <div class="card mg-t-20">
    <div class="card-header">
        <div class="pull-left">
            <strong>Description</strong>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            
            <div class="col-md-4">
                {!! $structure->description !!}
            </div>

            
            
        </div>
    </div>
  </div>

  <div class="card m-t-30">
    <div class="card-header">
      <h6>Médecins</h6>
    </div>
    <div class="card-body">
      	@if($structure_doctors)
	        <div class="row">
	        	@foreach($structure_doctors as $doctor)
	          
	            <div class="col-md-3">
	                            <div class="user-card" >
	                                <div class="user-card-body">
	                                    
	                                        <div class="user-thumb">
	                                            {!! doctor_avatar($doctor, '', '') !!}
	                                        </div>
                                    
                                    
                                    <div class="user-name title-bold title-black">
                                    	<strong>
                                        	{{ $doctor->first_name}} {{ $doctor->last_name}}
                                    	</strong>
                                    </div>
                                    <div class="user-location title-normal title-black-light">
                                        {{ $doctor->speciality->name }}
                                    </div>
                                    <div class="user-location title-normal title-black-light">
                                        {{ $doctor->town->name}}, {{ $doctor->neighborhood->name}}
                                    </div>
                                    <div class="send-flirt">
                                       
                                    </div>
                                </div> 
                                <div class="user-card-footer">
                                </div>
                            </div>
                        </div>
          	@endforeach
        </div>
      	@else
        	<h5 class="text-center">Pas de médecins</h2>
      	@endif
    </div>
  </div>
</div>


	</div>
@endsection
