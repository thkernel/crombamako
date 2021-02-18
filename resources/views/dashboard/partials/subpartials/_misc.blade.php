<div class="col-lg-12">
<div class="card shadow-base bd-0 mg-t-20">
              <div class="card-header pd-20 bg-transparent">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Dernières préinscriptions</h6>
              </div><!-- card-header -->

              <!-- Table -->
              <table class="table table-responsive mg-b-0 tx-12">
                <thead>
                  <tr class="tx-10">
                  
                    

                    <tr>
                      <th class="pd-y-5">Date</th>
                      <th class="pd-y-5">Prénom</th>
                      <th class="pd-y-5">Nom</th>
                      <th class="pd-y-5">Commune</th>
                      <th class="pd-y-5">Spécialité</th>
                      <th class="pd-y-5">Structure</th>
                      <th class="pd-y-5">Téléphone</th>
                     
                    </tr>


                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($subscription_requests as $subscription_request)
                    <tr>
                      <td>{{format_date($subscription_request->created_at, "d/m/Y")}}</td>

                      <td>{{$subscription_request->first_name}}</td>
                      <td>{{$subscription_request->last_name}}</td>
                      <td>{{$subscription_request->town->name}}</td>
                      <td>{{$subscription_request->speciality->name}}</td>
                      <td>{{ $subscription_request->structure_profile ? $subscription_request->structure_profile->name : ''}}</td>
                      <td>{{$subscription_request->phone}}</td>


                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!--
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <%= link_to raw('<i class="fa fa-angle-down mg-r-5"></i>Voir tout'), orders_path %>
              </div> --><!-- card-footer -->
            </div>
</div>