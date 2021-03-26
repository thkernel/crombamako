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
        <h1>ETAT DES MÉDECINS {{$contribution_status}}</h1>
      </div>


      <div class="term">
        <u><b>Spécialité:</b></u> {{ speciality_object($speciality_id) ? speciality_object($speciality_id)->name : ''}} <br />

        <u><b>Année:</b></u> {{ $selected_year }} <br />

        
      </div>
    <table class="table table-bordered">


    <thead>
      <tr>
         <th>N°Ins.</th>
          <th>Médecin</th>
        <th>Spécialité</th>
        <th>Commune</th>
        <th>Quartier</th>
        
      </tr>
    </thead>

    <tbody class="contributions-statement">
      @foreach($results as $result)
        <tr>
        
        <td>{{$result->doctor_order->reference}}</td>
        <td>{{$result->full_name}}</td>
        <td>{{$result->speciality ? $result->speciality->name : "MÉDECIN GÉNÉRALISTE"}}</td>
        <td>{{$result->town->name}}</td>
         <td>{{$result->neighborhood ? $result->neighborhood->name : ''}}
         </td>

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