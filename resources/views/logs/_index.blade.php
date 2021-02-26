@foreach($logs as $log)
    <tr>
        <td>{{$log->created_at}}</td>
        <td>{{$log->ip_address}}</td>
        <td>{{$log->browser}}</td>
        <td>{{$log->controller}}</td>
        <td>{{$log->action}}</td>
        <td>{{$log->user->login}}</td>
   
   
    

    
    </tr>
@endforeach