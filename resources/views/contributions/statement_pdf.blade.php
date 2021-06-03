@extends("layouts.statement")

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
        <h1>ETAT DES COTISATIONS</h1>
      </div>


      <div class="term">
        <u><b>Date début:</b></u> {{ format_date($start_date, "d/m/Y") }} <br />

         <u><b>Date fin:</b></u> {{ format_date($end_date, "d/m/Y") }} <br />

        <u><b>Commune:</b></u> {{ town_object($town_id) ? town_object($town_id)->name : ''}} <br />

        <u><b>Quartier:</b></u> {{ neighborhood_object($neighborhood_id) ? neighborhood_object($neighborhood_id)->name : ''}} <br />
      </div>



    <table class="table table-bordered">


    <thead>
      <tr>
        <th>Date</th>
        <th>N°Inscription</th>
        <th>Nom et prénom</th>
        <th>Années</th>
        <th>Montant</th>
        
      </tr>
    </thead>

    <tbody class="contributions-statement">
       @foreach($contributions as $contribution)
        <tr>
        <td>{{format_date($contribution->created_at, "d/m/Y")}}</td>
        <td>{{$contribution->doctor->doctor_order->reference}} </td>
        <td>{{$contribution->doctor->fullname}} </td>
        <td>
            @foreach($contribution->contribution_items as $contribution_item)
                <span class="contribution-year-item">
                {{ $contribution_item->year }}
                </span>
            @endforeach
        </td>
        <td>{{$contribution->total_amount}}</td>
        

        
        </tr>
    @endforeach
  </tbody>
  <tfoot class="tfoot-bg">
    <tr>
      <td colspan="4"><strong><center>TOTAL</center></strong></td>
      
      <td>
        <strong>
        {{ $sum_total }}
        </strong>
      </td>
    </tr>
  </tfoot>
</table>

<div class="amount-words">
  <b><u>Somme en toute lettre:</u></b> <br />
  {{$amount_words}}
  </div>

  <div class="signature">
    <b><u>Signature</u></b>
  </div>
</div>
</div>
  