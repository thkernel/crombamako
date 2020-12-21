
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><h3>MedPortail</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto order-1">
           
            <li class="nav-item">
              <a class="nav-link" href="{{ route('opportunities') }}">Opportinutés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog') }}">Blog</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{ route('contact_us') }}">Contactez-nous</a>
            </li>
            
           
          </ul>

          <ul class="navbar-nav d-lg-flex ml-2 order-3">
           
            <li class="nav-item">
              <a class="nav-link" href="#" class="btn btn-primary">Se connecter</a>
            </li>

             <li class="nav-item">
              <a class="btn btn-primary" href="#" >S'inscrire</a>
            </li>
            
          </ul>
          
        </div>
      </div>
      </nav>
