@extends("layouts.statement")

@section("content")

<div class="container">
  <div class="report-header">
    <div class="logo">
      <img src="{{ public_path("images/Logo-CNOM.png")}}" />
    </div>
  </div>

  <div class="report-details">
      <div class="title">
        <h1>ETAT DES COTISATIONS</h1>
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
  