@foreach($subscription_requests as $subscription_request)
    <tr>
    <td>{{$subscription_request->created_at}}</td>
    <td>{{$subscription_request->civility}}</td>
    <td>{{$subscription_request->first_name}}</td>
    <td>{{$subscription_request->last_name}}</td>
    <td>{{$subscription_request->locality->name}}</td>
    <td>{{$subscription_request->speciality->name}}</td>
    <td>{{ $subscription_request->structure ? $subscription_request->structure->name : ''}}</td>
    <td>{{$subscription_request->phone}}</td>


   
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('subscription_requests.edit', $subscription_request->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('subscription_requests.destroy', $subscription_request->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('subscription_requests.destroy', $subscription_request->id)"
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