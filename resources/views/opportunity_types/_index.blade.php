@foreach($opportunity_types as $opportunity_type)
    <tr>
    <td>{{$opportunity_type->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('opportunity_types.edit', $opportunity_type->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('opportunity_types.destroy', $opportunity_type->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('opportunity_type.destroy', $opportunity_type->id)"
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