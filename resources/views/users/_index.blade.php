@foreach($users as $user)
    <tr>
    <td>{{$user->email}}</td>
    <td>{{$user->role->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>Modifier
 </a>




 <form action="{{ route('users.destroy', $user->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('users.destroy', $user->id)"
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

