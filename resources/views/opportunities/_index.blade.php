@foreach($opportunities as $opportunity)
    <tr>
        <td>{{$opportunity->opportunity_type_id}}</td>
    <td>{{$opportunity->title}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('opportunities.edit', $opportunity->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('opportunities.destroy', $opportunity->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('opportunities.destroy', $opportunity->id)"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Supprimer
                            </a>
                        </form>
</div>
</td>
    
    </tr>
@endforeach