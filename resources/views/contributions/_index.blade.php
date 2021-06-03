@foreach($contributions as $contribution)
    <tr>
    <td>{{format_date($contribution->created_at, "d/m/Y")}}</td>
    <td>{{$contribution->doctor->doctor_order->reference}} </td>
    <td>{{$contribution->doctor->fullname}}</td>
    <td>
        @foreach($contribution->contribution_items as $contribution_item)
            <span class="contribution-year-item">
            {{ $contribution_item->year }}
            </span>
        @endforeach
    </td>
    <td>{{$contribution->total_amount}}</td>
    <td>{{$contribution->status}}</td>
    
<td>
	    <div class="action-buttons">
			

 


@if (!current_user()->isDoctor())
<a href="#" data-toggle="modal" data-target="#contribution-{{$contribution->id}}-modal">
    <i class="fa fa-ban" aria-hidden="true" title="Annuler" ></i>
    Annuler
</a>
@endif

<div id="contribution-{{$contribution->id}}-modal" class="c-modal modal fade" data-backdrop="static">
<!-- Modal -->
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Annulation</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <ul class="errors"></ul>
          Etes-vous sûr de vouloir annuler ce paiement?
          <p>
          ID: <b> {{ $contribution->id}} </b>
          </p>
        </div>
        <div class="modal-footer">
            
            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

            

            <form action="{{ route('contributions.cancel', $contribution->id)}}" method="post">
                            @csrf @method('PUT')
                            <a href="route('contributions.cancel', $contribution->id)"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Oui
                            </a>
                        </form>
        </div>
    </div>
</div>


</div>
</td>
    
    </tr>
@endforeach