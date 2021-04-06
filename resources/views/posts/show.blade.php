@extends("layouts.front")

@section("content")
<div class="container main-container">



    <div class="row">
        <div class="col-md-8">

            <!-- Header -->
            <div class="post-header">
                <div class="page-title-wrap">
            
                    
                    <div class="d-flex align-items-center post-title-price-wrap">
                        <div class="page-title">
                            <h2>{{ $post->title}} </h2>
                        </div>
                        
                    </div>
                    <div class="show-post-category">
                          {{ $post->post_category->name}}              
                    </div>
                    <div class="post-labels-wrap"> 
                        

                        <span class="item-author">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            {{ $post->user->login }}
                                        </span>
                                       
                                         <span class="item-view">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            {{ format_date($post->created_at, "d/m/Y") }}
                                        </span>

                    </div> 
                    

              </div>
              
                
                
                

                <div class="cover mg-b-15">
                    {!! post_thumbnail($post, "", "") !!}

                </div>
                   
            </div> <!-- end header -->



            <div class="post-description"> 
                {!! $post->content !!}
                
            </div>

            

            <div class="social-share">
            
                
            </div>
                    
        </div>
        <div class="col-md-4">

            <aside id="sidebar" class="sidebar-wrap">
                

            </aside>
        </div>

    </div>
            

            
        </div>
    </div>





</div>

@endsection