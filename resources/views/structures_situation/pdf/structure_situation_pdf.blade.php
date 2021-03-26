@extends("layouts.doctor_situation")

@section("content")

<div class="container">
  <div class="report-header">
    <span class="logo">
      <img src="{{ public_path("images/Logo-CNOM.png")}}" />
    </span>
    <span class="company">
      <h3>CROM </h3><br/>
      
        Téléphone: {{ config('global.company_phone')}}<br />
        Email: {{ config('global.company_email')}}<br />
        Adresses: {{ config('global.company_addresses')}}<br />
      
    </span>
  </div>

  <div class="report-details">
      <div class="title">
        <h1>ETAT DES STRUCTURES</h1>
      </div>


      <div class="term">
        <u><b>Catégorie:</b></u> {{ structure_category_object($structure_category_id) ? structure_category_object($structure_category_id)->name : ''}} <br />

        <u><b>Commune:</b></u> {{ town_object($town_id) ? town_object($town_id)->name : ''}} <br />

        <u><b>Quartier:</b></u> {{ neighborhood_object($neighborhood_id) ? neighborhood_object($neighborhood_id)->name : ''}} <br />
      </div>
    <table class="table table-bordered">


    <thead>
      <tr>
         <th>Catégorie de structure</th>
        <th>Nom de la structure</th>
        <th>Commune</th>
        <th>Quartier</th>
        
      </tr>
    </thead>

    <tbody class="contributions-statement">
      @foreach($results as $structure)
    <tr>
        <td>{{$structure->structure_category->name}}</td>
        <td>{{$structure->name}}</td>
        <td>{{$structure->town->name}}</td>
        <td>{{$structure->neighborhood->name}}</td>
    
    
    
    </tr>
@endforeach
    </tbody>
  
</table>



  <div class="signature">
    <b><u>Signature</u></b>
  </div>
</div>
</div>
@endsection