@foreach($roles as $role)
    <tr>
    <td>{{$role->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>Modifier
 </a>




 <form action="{{ route('roles.destroy', $role->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('roles.destroy', $role->id)"
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

