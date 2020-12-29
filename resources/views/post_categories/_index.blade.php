@foreach($post_categories as $post_category)
    <tr>
    <td>{{$post_category->name}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('post_categories.edit', $post_category->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('post_categories.destroy', $post_category->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('post_categories.destroy', $post_category->id)"
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