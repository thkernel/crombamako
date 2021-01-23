<!-- ########## START: LEFT PANEL ########## -->

<ul class="br-sideleft-menu">
  <li class="br-menu-item">
    
    <a class="br-menu-link" href="{{ route('dashboard_path') }}">
      <i class="fa fa-home tx-20"></i><span class="menu-item-label"> Tableau de bord</span>
    </a>

  </li><!-- br-menu-item -->

  
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('structures.index') }}">
      <i class="fa fa-building-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Structures</span>
    
    </a>

  </li><!-- br-menu-item -->
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('subscription_requests.index') }}">
      <i class="fa fa-list-alt tx-20" aria-hidden="true"></i> <span class="menu-item-label">Préinscriptions</span>
    
    </a>

  </li><!-- br-menu-item -->
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('doctors.index') }}">
      <i class="fa fa-user-md tx-20" aria-hidden="true"></i> <span class="menu-item-label">Médecins</span>
    
    </a>

  </li><!-- br-menu-item -->

  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('contributions.index') }}">
      <i class="fa fa-money tx-20" aria-hidden="true"></i> <span class="menu-item-label">Cotisations</span>
    
    </a>

  </li><!-- br-menu-item -->

  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('certificate_requests.index') }}">
      <i class="fa fa-file-text-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Demandes de document</span>
    
    </a>

  </li><!-- br-menu-item -->

  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('visit_summaries.index') }}">
      <i class="fa fa-newspaper-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Résumés des visites</span>
    
    </a>

  </li><!-- br-menu-item -->
  


  <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub ">
            <i class="fa fa-cubes tx-20"></i>
            <span class="menu-item-label">Opportunités</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item">
              <a class="sub-link" href="{{ route('opportunity_types.index') }}">Types d'opportunités</a>

            </li>

            <li class="sub-item">
              <a class="sub-link" href="{{ route('opportunities.index') }}">Opportunités</a>

            </li>

          </ul>
        </li>

    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub ">
        <i class="fa fa-file-o tx-20"></i>
        <span class="menu-item-label">Articles</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item">
          <a class="sub-link" href="{{ route('post_categories.index') }}">Catégories</a>

        </li>

        <li class="sub-item">
          <a class="sub-link" href="{{ route('posts.index') }}">Articles</a>

        </li>

      </ul>
    </li>


    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub ">
        <i class="fa fa-bar-chart tx-20"></i>
        <span class="menu-item-label">Statistiques</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item">
          <a class="sub-link" href="{{ route('dashboard_path') }}">Médecins</a>

        </li>

        <li class="sub-item">
          <a class="sub-link" href="{{ route('dashboard_path') }}">Structures</a>

        </li>

      </ul>
    </li>


     

       
        
        

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fa fa-cog tx-20"></i>
            <span class="menu-item-label">Paramètres</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            
          
            <li class="sub-item">
              
                <a class="sub-link" href="{{ route('users.index') }}">Utilisateurs</a>
            </li>

             <li class="sub-item">
                <a class="sub-link" href="{{ route('roles.index') }}">Rôles</a>
            </li>

           

            <li class="sub-item">
                <a class="sub-link" href="{{ route('structure_types.index') }}">Types de structures</a>
            </li>

            <li class="sub-item">
                <a class="sub-link" href="{{ route('structure_categories.index') }}">Catégories de structure</a>
            </li>



          <li class="sub-item">
                <a class="sub-link" href="{{ route('specialities.index') }}">Spécialités</a>
            </li>
            <li class="sub-item">
                <a class="sub-link" href="{{ route('localities.index') }}">Localités</a>
            </li>

            <li class="sub-item">
                <a class="sub-link" href="{{ route('certificate_types.index') }}">Types de document</a>
            </li>

            <li class="sub-item">
                <a class="sub-link" href="{{ route('logs.index') }}">Logs</a>
            </li>
        
           

             
          </ul>
        </li>


       
      </ul><!-- br-sideleft-menu -->

      
       
        
  

    <!-- ########## END: LEFT PANEL ########## -->

    