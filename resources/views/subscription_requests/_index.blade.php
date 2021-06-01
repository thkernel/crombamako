@foreach($subscription_requests as $subscription_request)
    <tr>
    <td>{{format_date($subscription_request->created_at, "d/m/Y")}}</td>

    <td>{{$subscription_request->first_name}}</td>
    <td>{{$subscription_request->last_name}}</td>
    <td>{{$subscription_request->town->name}}</td>
    <td>{{$subscription_request->speciality ? $subscription_request->speciality->name : ''}}</td>
    <td>{{ $subscription_request->structure_profile ? $subscription_request->structure_profile->name : ''}}</td>
    <td>{{$subscription_request->phone}}</td>


   
    
<td>
	    <div class="action-buttons">
			
 <a  href="{{ route('subscription_requests.show', $subscription_request->id) }}">
    <i class="fa fa-eye" aria-hidden="true" title="Modifier"></i>
    Voir
 </a>

 <a  href="{{ route('subscription_requests.edit', $subscription_request->id) }}">
    <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>

<a  href="{{ route('subscription_requests.show', $subscription_request->id) }}">
    <i class="fa fa-check" aria-hidden="true" title="Modifier"></i>
    Valider
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