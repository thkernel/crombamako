@foreach($certificate_types as $certificate_type)
    <tr>
    <td>{{$certificate_type->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('certificate_types.edit', $certificate_type->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('certificate_types.destroy', $certificate_type->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('certificate_type.destroy', $certificate_type->id)"
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