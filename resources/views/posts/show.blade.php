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
                    
                    <div class="post-labels-wrap"> 
                        

                    </div> 
                    

              </div>
              
                
                
                

                <div class="cover">
                    <img src="{{url('/images/post-missing.jpg')}}" alt="">

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