<div class="col-lg-12">
<div class="card shadow-base bd-0 mg-t-20">
              <div class="card-header pd-20 bg-transparent">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Dernières commandes</h6>
              </div><!-- card-header -->
              <table class="table table-responsive mg-b-0 tx-12">
                <thead>
                  <tr class="tx-10">
                  
                    <th class="pd-y-5">Date Enreg.</th>
                    <th class="pd-y-5">Réf. commande</th>
                    <th class="pd-y-5">Client</th>
                    <th class="pd-y-5">Sous-total</th>
                    <th class="pd-y-5">Taxe</th>
                    <th class="pd-y-5">Total</th>
                    <th class="pd-y-5">Statut</th>
                    <th class="pd-y-5">Paiement</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <% @orders.each do |order| %>
                    <tr>
                    
                      <td class="valign-middle"><%= order.created_at.strftime("%d/%m/%Y") %></td>
                      <td class="valign-middle"><%= order.uid %></td>
                      <td class="valign-middle"><%= user(order.user_id).profile.full_name %></td>
                      <td class="valign-middle"><%= order.subtotal %></td>
                      <td class="valign-middle"><%= order.tax %></td>
                      <td class="valign-middle"><%= order.total %></td>
                       <td class="valign-middle"><%= order.status %></td>

                      <td class="valign-middle"><%= order.paid %></td>
                      

                    </tr>
                  <% end %>
                  
                </tbody>
              </table>
              <!--
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <%= link_to raw('<i class="fa fa-angle-down mg-r-5"></i>Voir tout'), orders_path %>
              </div> --><!-- card-footer -->
            </div>
</div>