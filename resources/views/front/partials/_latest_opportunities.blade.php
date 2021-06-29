<section class="section">
	<div class="section-title">
		<h3><p class="text-center">Opportunités</p></h3>
	</div>
	<div class="section-content">
		<div class="row">
		@foreach($opportunities as $opportunity)
						<div class="col-md-4 post-item">	
							<div class="card">
							    <div class="card-body">
							        <div class="card-thumbnail">
							        	<div class="opportunity-type">
							              {{ $opportunity->opportunity_type->name}}              
							        </div>
							        
							        	<a  href="{{ route('show_opportunity_path', $opportunity->slug) }}">
							           <div class="post-thumbnail">

							            {!! opportunity_thumbnail($opportunity, "", "", "medium") !!}



							        </div>
							        </a>
							    </div>
							        <div class="card-title">
							            <h5> 
							            	 
							            	<a  href="{{ route('show_opportunity_path', $opportunity->slug) }}">{{ Str::words($opportunity->title,7) }} </a>
							            </h5>                         
							        </div>
							        
							            
							        <div class="excerpt label-wrap label-right hide-on-list">
							                            
							        </div>
							       
							        
							        <div class="item-footer">
							           

							            <div class="item-author">
							                <i class="fa fa-user" aria-hidden="true"></i>
							                {{ $opportunity->user->login }}
							            </div>
							           
							             <div class="item-view pull-right">
							                <i class="fa fa-clock-o" aria-hidden="true"></i>
							                {{ format_date($opportunity->created_at, "d/m/Y") }}
							            </div>
							        </div>
							           
							    </div>
							</div>
						</div>
					@endforeach
				</div>
	</div>
</section>