@foreach($business_licenses as $business_license)
    <tr>
        <td>{{$business_license->created_at}}</td>
        <td>{{$business_license->reference}}</td>
        <td>{{$business_license->year}}</td>
        <td>{{$business_license->doctor->full_name}}</td>
    
   
    
        <td>
	       <div class="action-buttons">
			
            @if (current_user()->isDoctor())
                <a  href="{{ route('business_licenses.edit', $business_license->id) }}">
                    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
                    Modifier
                </a>
            @endif

             @if ($business_license->attachment)
                <a  href="{{ asset("storage/business_licenses/".$business_license->attachment->blob->filename)}}">
                  <i class="fa fa-file-pdf-o" aria-hidden="true" title="Télécharger"></i>
                  Télécharger
                </a>
            @endif


            @if (current_user()->isDoctor())
                <a href="#" data-toggle="modal" data-target="#business-license-modal">
                    <i class="fa fa-trash" aria-hidden="true" title="Supprimer" ></i>
                    Supprimer
                </a>
            @endif

<div id="business-license-modal" class="c-modal modal fade" data-backdrop="static">
<!-- Modal -->
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <ul class="errors"></ul>
          Etes-vous sûr de vouloir supprimer ce enregistrement?
          <p>
          ID: <b> {{ $business_license->id}} </b>
          </p>
        </div>
        <div class="modal-footer">
            
            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

            

            <form action="{{ route('business_licenses.destroy', $business_license->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('business_licenses.destroy', $business_license->id)"
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