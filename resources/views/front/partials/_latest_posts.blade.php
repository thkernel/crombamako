<section class="section">
	<div class="section-title">
		<h3><p class="text-center">Actualité</p></h3>
	</div>
	<div class="section-content">
		<div class="row">
		@foreach($posts as $post)
						<div class="col-md-4 post-item">	
							<div class="card">
							    <div class="card-body">

							        <div class="card-thumbnail">
							        	<div class="post-category">
							              {{ $post->post_category->name}}              
							        </div>
							        	<a  href="{{ route('show_post_path', $post->slug) }}">
							           <div class="post-thumbnail">

							            {!! post_thumbnail($post, "", "") !!}



							        </div>
							        </a>
							    </div>
							        <div class="card-title">
							            <h5> 
							            	 
							            	<a  href="{{ route('show_post_path', $post->slug) }}">{{ $post->title }} </a>
							            </h5>                         
							        </div>

							        
							            
							        <div class="excerpt label-wrap label-right hide-on-list">
							                              
							        </div>
							       
							        
							        <div class="item-footer">
							           

							            <div class="item-author">
							                <i class="fa fa-user" aria-hidden="true"></i>
							                {{ $post->user->login }}
							            </div>
							           
							             <div class="item-view pull-right">
							                <i class="fa fa-clock-o" aria-hidden="true"></i>
							                {{ format_date($post->created_at, "d/m/Y") }}
							            </div>
							        </div>
							           
							    </div>
							</div>
						</div>
					@endforeach
				</div>
	</div>
</section>