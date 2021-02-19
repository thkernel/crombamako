@foreach($structure_services as $structure_service)
    <tr>
    
        <td>{{$structure_service->structure->name}}</td>

    
    <td>
	    <div class="action-buttons">
            @can('update', App\Models\StructureService::class)
			

             <a  href="{{ route('structure_services.edit', $structure_service->id) }}">
                <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
                Modifier
             </a>
            @endcan

            @can('delete', App\Models\StructureService::class)
                <a href="#" data-toggle="modal" data-target="#structure-prestation-{{$structure_service->id}}-modal">
                    <i class="fa fa-trash" aria-hidden="true" title="Supprimer" ></i>
                    Supprimer
                </a>
            @endcan

<div id="structure-service-{{$structure_service->id}}-modal" class="c-modal modal fade" data-backdrop="static">
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
          ID: <b> {{ $structure_service->structure->name}} </b>
          </p>
        </div>
        <div class="modal-footer">
            
            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

            

            <form action="{{ route('structure_services.destroy', $structure_service->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('structure_services.destroy', $structure_service->id)"
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