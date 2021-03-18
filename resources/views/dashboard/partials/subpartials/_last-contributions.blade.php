<div class="col-lg-12">
<div class="card shadow-base bd-0 mg-t-20">
              <div class="card-header pd-20 bg-transparent">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Dernières paiements</h6>
              </div><!-- card-header -->

              <!-- Table -->
              <table class="table table-responsive mg-b-0 tx-12">
                <thead>
                  
                  
                    

                    <tr>
                      <th>Date</th>
                      <th>Médecin</th>
                      <th>Années</th>
                      <th>Montant</th>
                     
                    </tr>


                   
                 
                </thead>
                <tbody>
                  @foreach($contributions as $contribution)
                    <tr>
                    <td>{{format_date($contribution->created_at, "d/m/Y")}}</td>
                    <td>{{$contribution->doctor->fullname}}</td>
                    <td>
                        @foreach($contribution->contribution_items as $contribution_item)
                            <span class="contribution-year-item">
                            {{ $contribution_item->year }}
                            </span>
                        @endforeach
                    </td>
                    <td>{{$contribution->total_amount}}</td>
                  @endforeach
                </tbody>
              </table>
              <!--
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <%= link_to raw('<i class="fa fa-angle-down mg-r-5"></i>Voir tout'), orders_path %>
              </div> --><!-- card-footer -->
            </div>
</div>