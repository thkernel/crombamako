@foreach($contributions as $contribution)
    <tr>
    <td>{{$contribution->created_at}}</td>
    <td>{{$contribution->doctor_id}}</td>
    <td>{{$contribution->year}}</td>
    <td>{{$contribution->amount}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('contributions.edit', $contribution->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('contributions.destroy', $contribution->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('contributions.destroy', $contribution->id)"
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