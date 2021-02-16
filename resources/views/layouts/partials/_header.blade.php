
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home_path') }}"><h3>{{ config('global.application_name')}}</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto order-1">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about_path') }}">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('opportunities.all') }}">Opportunités</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('all_posts_path') }}">Actualité</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('all_posts_path') }}">Démarches administratives</a>
            </li>

           
             <li class="nav-item">
              <a class="nav-link" href="{{ route('contact_forms.create') }}">Contactez-nous</a>
            </li>
            
           
          </ul>

          <ul class="navbar-nav d-lg-flex ml-2 order-3">
          @auth
            <li class="nav-item">
        

 <a class="btn btn-link" href="{{ route('dashboard_path') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
        Mon compte
    </a>
        </li>
              <li class="nav-item btn btn-link">
              <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Se déconnecter
                            </x-dropdown-link>
                        </form>
                

              </li>
           @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
            </li>

             <li class="nav-item">
              <a class="btn btn-primary" href="{{ route('subscription_requests.create') }}">Préinscription</a>
            </li>
            @endauth
            
          </ul>
          
        </div>
      </div>
      </nav>
