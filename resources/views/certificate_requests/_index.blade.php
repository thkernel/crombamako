@foreach($certificate_requests as $certificate_request)
    <tr>
        <td>{{$certificate_request->created_at}}</td>
        <td>{{$certificate_request->certificate_type->name}}</td>
        <td>{{$certificate_request->doctor_id}}</td>
    
   
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('certificate_requests.edit', $certificate_request->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('certificate_requests.destroy', $certificate_request->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('certificate_requests.destroy', $certificate_request->id)"
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