@foreach($structure_categories as $structure_category)
    <tr>
    <td>{{$structure_category->name}}</td>
    
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('structure_categories.edit', $structure_category->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>

<a href="#" data-toggle="modal" data-target="#structure-category-{{$structure_category->id}}-modal">
    <i class="fa fa-trash" aria-hidden="true" title="Supprimer" ></i>
    Supprimer
</a>

<div id="structure-category-{{$structure_category->id}}-modal" class="c-modal modal fade" data-backdrop="static">
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
          ID: <b> {{ $structure_category->name}} </b>
          </p>
        </div>
        <div class="modal-footer">
            
            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

            

            <form action="{{ route('structure_categories.destroy', $structure_category->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('structure_categories.destroy', $structure_category->id)"
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