@foreach($structure_categories as $structure_category)
    <tr>
    <td>{{$structure_category->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('structure_categories.edit', $structure_category->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('structure_categories.destroy', $structure_category->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('structure_categories.destroy', $structure_category->id)"
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