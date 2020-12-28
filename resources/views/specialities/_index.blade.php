@foreach($specialities as $speciality)
    <tr>
    <td>{{$speciality->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('specialities.edit', $speciality->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('specialities.destroy', $speciality->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('speciality.destroy', $speciality->id)"
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