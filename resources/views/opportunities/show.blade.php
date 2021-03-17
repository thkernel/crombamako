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
                            <h2>{{ $opportunity->title}} </h2>
                        </div>
                        
                    </div>
                    
                    <div class="post-labels-wrap"> 
                        
                        <span class="opportunity-type">
                              {{ $opportunity->opportunity_type->name}}              
                        </span>

                        <span class="item-author">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            {{ $opportunity->user->login }}
                                        </span>
                                       
                                         <span class="item-view">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            {{ format_date($opportunity->created_at, "d/m/Y") }}
                                        </span>


                    </div> 
                    

              </div>
              
                
                
                

                <div class="cover mg-b-15">
                    {!! opportunity_thumbnail($opportunity, "", "") !!}

                </div>
                   
            </div> <!-- end header -->



            <div class="post-description"> 
                {!! $opportunity->content !!}
                
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