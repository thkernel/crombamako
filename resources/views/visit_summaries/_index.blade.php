@foreach($visit_summaries as $visit_summary)
    <tr>
        <td>{{$visit_summary->created_at}}</td>
        <td>{{$visit_summary->structure->name}}</td>
       
    
   
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('visit_summaries.edit', $visit_summary->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('visit_summaries.destroy', $visit_summary->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('visit_summaries.destroy', $visit_summary->id)"
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