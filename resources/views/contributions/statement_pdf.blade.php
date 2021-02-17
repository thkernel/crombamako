@extends("layouts.pdf")

@section("content")
<div class="container">

    <table class="table table-bordered">


  <thead>
    <tr>
      <th>Date</th>
      <th>Médecin</th>
      <th>Années</th>
      <th>Montant</th>
      
    </tr>
  </thead>

  <tbody class="contributions-statement">
   @foreach($contributions as $contribution)
    <tr>
    <td>{{format_date($contribution->created_at, "d/m/Y")}}</td>
    <td>{{$contribution->doctor->fullname}}</td>
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
      <td colspan="3"><strong><center>TOTAL</center></strong></td>
      
      <td>
        <strong>
        {{ $sum_total }}
        </strong>
      </td>
    </tr>
  </tfoot>
</table>
</div>
  