@foreach($localities as $locality)
    <tr>
    <td>{{$locality->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('localities.edit', $locality->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('localities.destroy', $locality->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('locality.destroy', $locality->id)"
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