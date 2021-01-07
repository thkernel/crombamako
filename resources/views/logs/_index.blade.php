@foreach($logs as $log)
    <tr>
        <td>{{$log->created_at}}</td>
        <td>{{$log->ip_address}}</td>
        <td>{{$log->browser}}</td>
        <td>{{$log->controller}}</td>
        <td>{{$log->action}}</td>
        <td>{{$log->params}}</td>
   
   
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('logs.show', $log->id) }}">
    <i class="fa fa-eye" aria-hidden="true" title="Voir"></i>
    Voir
 </a>




</div>
</td>
    
    </tr>
@endforeach