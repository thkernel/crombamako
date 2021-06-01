<div class="col-sm-4 col-xl-4">
            <div class="bg-info rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                
                <i class="fa fa-gift tx-60 lh-0 tx-white op-7" aria-hidden="true"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Articles vendus</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                  <%= @total_selling_products %>
                  </p>
                  <span class="tx-11 tx-roboto tx-white-8">
                  </span>
                </div>
              </div>
              <div id="ch1" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-4 col-xl-4 mg-t-20 mg-sm-t-0">
            <div class="bg-purple rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
               
                <i class="fa fa-usd tx-60 lh-0 tx-white op-7" aria-hidden="true"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Montant total</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                      <%= @total_selling_product_amount %>
                  </p>
                  <span class="tx-11 tx-roboto tx-white-8">
                  </span>
                </div>
              </div>
              <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-3 col-xl-4 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-usd tx-60 lh-0 tx-white op-7" aria-hidden="true"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Marge total</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                    <%= @total_margin %>
                  </p>
                  <span class="tx-11 tx-roboto tx-white-8">
                  
                  </span>
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
