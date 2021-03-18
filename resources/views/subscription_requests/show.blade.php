@extends("layouts.dashboard")

@section("content")

  <div class="container page-wrapper mg-t-80 mg-b-30">
 
    <div class="row">
      <div class="col-md-9">
        <!-- -->
        <div class="card shadow-base bd-0">
          <div class="card-header bg-transparent pd-20">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Fiche d'une préinscription</h6>
          </div><!-- card-header -->
          <div class="card-body">
           
            <ul class="list-2-cols list-unstyled">
              <li class="detail-address">
                  <strong>ID: </strong> 
                  <span>{{ $subscription_request->id}}</span>
                  
              </li>
              

              <li class="detail-address">
                <strong>Date: </strong> 
                <span>{{ format_date($subscription_request->created_at, 'd/m/Y')}}</span>
              </li>
              <li class="detail-city">
                <strong>Civilité: </strong> 
                <span>{{ $subscription_request->civility}}</span>
              </li>
              <li class="detail-city">
                <strong>Prénom: </strong> 
                <span>{{ $subscription_request->first_name}}</span>
              </li>
              <li class="detail-city">
                <strong>Nom: </strong> 
                <span>{{ $subscription_request->last_name}}</span>
              </li>
              <li class="detail-city">
                <strong>Commune: </strong> 
                <span>{{ $subscription_request->town->name}}</span>
              </li>
               <li class="detail-city">
                <strong>Quartier: </strong> 
                <span>{{ $subscription_request->neighborhood->name}}</span>
              </li>
              <li class="detail-city">
                <strong>Adresse: </strong> 
                <span>{{ $subscription_request->address}}</span>
              </li>
              <li class="detail-city">
                <strong>Spécialité: </strong> 
                <span>{{$subscription_request->speciality ? $subscription_request->speciality->name : ''}}</span>
              </li>
              <li class="detail-city">
                <strong>Lieu de travail: </strong> 
                <span>{{ $subscription_request->structure ? $subscription_request->structure->name : ''}}</span>
              </li>
              <li class="detail-city">
                <strong>Email: </strong> 
                <span>{{ $subscription_request->email}}</span>
              </li>

              <li class="detail-city">
                <strong>A propos: </strong> 
                <span>{{ $subscription_request->description}}</span>
              </li>
              
                
            </ul>
          </div>
          <div class="card-footer tx-12 pd-y-15 bg-transparent">
            

          <form action="{{ route('subscription_request.validate_subscription', $subscription_request->id)}}" method="POST">
            @csrf @method('PUT')
              <a href="route('subscription_request.validate_subscription', $subscription_request->id)"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-primary">
                                                
                                Valider la préinscription
                            </a>
          </form>

          </div>

        </div>
      </div>
     
        

       
      <div class="col-md-3">
         
       

        

         <div class="card shadow-base bd-0 mg-t-15">
          <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Pièces-jointes</h6>
            
          </div><!-- card-header -->
         
            
            <ul class="list-group">
              @foreach($subscription_request->attachments as $attachment)
                <li class="list-group-item rounded-top-0">
                  <p class="mg-b-0">
                    <i class="fa fa-file-text-o tx-info mg-r-8"></i>
                    <strong class="tx-inverse tx-medium">
                   {{ $attachment->id}}                    
                    </strong>
                  
                    
                  </p>
                </li>
              @endforeach
              <!-- add more here -->
            </ul>
          
        </div>
        
      </div>
    </div>
  </div>
</div>





@endsection

