<li class="nav-item">
    <!-- <a class="nav-link" href="#">Link</a> -->
   

    <a class="btn btn-link" href="{{ route('home') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        Retour au site
    </a>

        </li>

<div class="dropdown">
    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
        <span class="logged-name hidden-md-down">{{ current_user()->login }}</span>
            <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
        <span class="square-10 bg-success"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-header wd-250">
        <div class="tx-center">
        <img src="https://via.placeholder.com/500" class="wd-80 rounded-circle" alt="">

        <h6 class="logged-fullname">{{ current_user()->email }}</h6>
        
        </div>
        <hr>
        <div class="tx-center">
        
        </div>
        
        <ul class="list-unstyled user-profile-nav">
            
            
            <div class="dropdown-divider"></div>
            <li>
               
                    
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Se déconnecter
                            </x-dropdown-link>
                        </form>
                </li>


        </ul>
    </div><!-- dropdown-menu -->
</div><!-- dropdown -->