




@foreach($results as $result)
    <tr>
        
        <td>{{$result->doctor_order->reference}}</td>
        <td>{{$result->full_name}}</td>
        <td>{{$result->speciality ? $result->speciality->name : "MÉDECIN GÉNÉRALISTE"}}</td>
        <td>{{$result->town->name}}</td>
         <td>{{$result->neighborhood ? $result->neighborhood->name : ''}}</td>

    </tr>
    
@endforeach
   
