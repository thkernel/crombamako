@foreach($contributions as $contribution)
    <tr>
    <td>{{format_date($contribution->created_at, "d/m/Y")}}</td>
        <td>{{$contribution->doctor->doctor_order->reference}} </td>

    <td>{{$contribution->doctor->fullname}}</td>
    <td>
        @foreach($contribution->contribution_items as $contribution_item)
            <span class="contribution-year-item">
            {{ $contribution_item->year }}
            </span>
        @endforeach
    </td>
    <td>{{$contribution->total_amount}}</td>
    

    
    </tr>
@endforeach