@foreach($posts as $post)
    <tr>
        <td>{{$post->post_category_id}}</td>
    <td>{{$post->title}}</td>
    
<td>
	    <div class="action-buttons">
			

 <a  href="{{ route('posts.edit', $post->id) }}">
    <i class="fa fa-plus" aria-hidden="true" title="Modifier"></i>
    Modifier
 </a>



<form action="{{ route('posts.destroy', $post->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="route('posts.destroy', $post->id)"
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