@foreach($structure_types as $structure_type)
    <tr>
    <td>{{$structure_type->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('structure_types.edit', $structure_type->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('structure_types.destroy', $structure_type->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('structure_type.destroy', $structure_type->id)"
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