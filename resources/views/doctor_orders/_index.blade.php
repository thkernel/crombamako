@foreach($doctor_orders as $doctor_order)
    <tr>
    
    <td>{{$doctor_order->created_at}}</td>
    <td>{{$doctor_order->reference}}</td>
    <td>{{$doctor_order->doctor->fullname}}</td>
    <td>{{$doctor_order->year}}</td>
    

    
    </tr>
@endforeach