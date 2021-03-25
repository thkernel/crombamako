




@foreach($results as $result)
    <tr>
        
        <td>{{$result->doctor_order->reference}}</td>
        <td>{{$result->full_name}}</td>
        <td>{{$result->speciality->name}}</td>
        <td>{{$result->town->name}}</td>
         <td>{{$result->neighborhood ? $result->neighborhood->name : ''}}</td>

    </tr>
    
@endforeach
   
