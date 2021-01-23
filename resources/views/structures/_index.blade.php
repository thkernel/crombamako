@foreach($structures as $structure)
    <tr>
        <td>{{$structure->structure_category->name}}</td>
    <td>{{$structure->name}}</td>
    <td>{{$structure->locality->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('structures.edit', $structure->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('structures.destroy', $structure->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('structures.destroy', $structure->id)"
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