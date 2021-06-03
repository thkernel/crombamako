@foreach($results as $structure)
    <tr>
        <td>{{$structure->structure_category->name}}</td>
        <td>{{$structure->name}}</td>
        <td>{{$structure->town->name}}</td>
        <td>{{$structure->neighborhood->name}}</td>
    
    
    
    </tr>
@endforeach