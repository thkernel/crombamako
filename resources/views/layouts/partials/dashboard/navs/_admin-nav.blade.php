<!-- ########## START: LEFT PANEL ########## -->

<ul class="br-sideleft-menu">
  <li class="br-menu-item">
    
    <a class="br-menu-link" href="{{ route('dashboard_path') }}">
      <i class="fa fa-home tx-20"></i><span class="menu-item-label"> Tableau de bord</span>
    </a>

  </li><!-- br-menu-item -->

  
  
  @can('read', App\Models\Structure::class)
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub ">
        <i class="fa fa-building-o tx-20"></i>
        <span class="menu-item-label">Structures</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item">
          <a class="sub-link" href="{{ route('structures.index') }}">Structures</a>

        </li>

        @can('read', App\Models\StructureStaff::class)
          <li class="sub-item">
            <a class="sub-link" href="{{ route('structure_staffs.index') }}">Personnel</a>

          </li>
        @endcan

        @can('read', App\Models\StructurePrestation::class)

          <li class="sub-item">
            <a class="sub-link" href="{{ route('structure_prestations.index') }}">Activités </a>

          </li>
        @endcan

        @can('read', App\Models\StructureService::class)

          <li class="sub-item">
            <a class="sub-link" href="{{ route('structure_services.index') }}">Services</a>

          </li>
        @endcan

        
        @can('read', App\Models\BusinessLicense::class)
          <li class="sub-item">
            <a class="sub-link" href="{{ route('business_licenses.index') }}">Licences d'exploitation</a>

          </li>
        @endcan

        @can('read', App\Models\VisitSummary::class)
          <li class="sub-item">
            <a class="sub-link" href="{{ route('visit_summaries.index') }}">Résumés de visite</a>

          </li>
        @endcan

      </ul>
    </li>
  @endcan

  @can('read', App\Models\SubscriptionRequest::class)
    <li class="br-menu-item">
      

      <a class="br-menu-link" href="{{ route('subscription_requests.index') }}">
        <i class="fa fa-list-alt tx-20" aria-hidden="true"></i> <span class="menu-item-label">Préinscriptions</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan

  @can('read', App\Models\DoctorProfile::class)
    <li class="br-menu-item">
      

      <a class="br-menu-link" href="{{ route('doctors.index') }}">
        <i class="fa fa-user-md tx-20" aria-hidden="true"></i> <span class="menu-item-label">Médecins</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan

  @can('read', App\Models\Approval::class)
    <li class="br-menu-item">
      

      <a class="br-menu-link" href="{{ route('approvals.index') }}">
        <i class="fa fa-id-card-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Agrément</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan


  @can('read', App\Models\Contribution::class)

    <li class="br-menu-item">
      

      <a class="br-menu-link" href="{{ route('contributions.index') }}">
        <i class="fa fa-money tx-20" aria-hidden="true"></i> <span class="menu-item-label">Cotisations</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan

  @can('read', App\Models\DcomentRequest::class)
    <li class="br-menu-item">
      

      <a class="br-menu-link" href="{{ route('document_requests.index') }}">
        <i class="fa fa-file-text-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Demandes de document</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan


  @can('read', App\Models\Contribution::class)

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
  @endcan

  @can('read', App\Models\Post::class)

    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub ">
        <i class="fa fa-thumb-tack tx-20"></i>
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
  @endcan

<!--
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
-->

  @can('read', App\Models\Page::class)

  <li class="br-menu-item">
      
      <a class="br-menu-link" href="{{ route('pages.index') }}">
        <i class="fa fa-file-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Pages</span>
      
      </a>

    </li><!-- br-menu-item -->
  @endcan
       
        
        

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fa fa-cog tx-20"></i>
            <span class="menu-item-label">Paramètres</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">


            
            @can('read', App\Models\User::class)
              <li class="sub-item">
                
                  <a class="sub-link" href="{{ route('users.index') }}">Utilisateurs</a>
              </li>
            @endcan

            @can('read', App\Models\Role::class)
             <li class="sub-item">
                <a class="sub-link" href="{{ route('roles.index') }}">Rôles</a>
            </li>
            @endcan

            @can('read', App\Models\Permission::class)
              <li class="sub-item">
                
                  <a class="sub-link" href="{{ route('permissions.index') }}">Droits d'utilisateurs</a>
              </li>
            @endcan

           
            @can('read', App\Models\StructureType::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('structure_types.index') }}">Types de structures</a>
              </li>
            @endcan

            @can('read', App\Models\StructureCategory::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('structure_categories.index') }}">Catégories de structure</a>
              </li>
            @endcan

            @can('read', App\Models\ResourceCategory::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('resource_categories.index') }}">Catégories de ressource</a>
              </li>
            @endcan


            @can('read', App\Models\Speciality::class)

              <li class="sub-item">
                  <a class="sub-link" href="{{ route('specialities.index') }}">Spécialités</a>
              </li>
            @endcan

            @can('read', App\Models\Town::class)

              <li class="sub-item">
                  <a class="sub-link" href="{{ route('towns.index') }}">Communes</a>
              </li>
            @endcan

            @can('read', App\Models\Neighborhood::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('neighborhoods.index') }}">Quartiers</a>
              </li>
            @endcan

            @can('read', App\Models\DocumentType::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('document_types.index') }}">Types de document</a>
              </li>
            @endcan

            @can('read', App\Models\Service::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('services.index') }}">Services</a>
              </li>
            @endcan

            @can('read', App\Models\Prestation::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('prestations.index') }}">Activités</a>
              </li>
            @endcan

            @can('read', App\Models\ActivityLog::class)
              <li class="sub-item">
                  <a class="sub-link" href="{{ route('logs.index') }}">Logs</a>
              </li>
            @endcan
        
           

             
          </ul>
        </li>


       
      </ul><!-- br-sideleft-menu -->

      
       
        
  

    <!-- ########## END: LEFT PANEL ########## -->

    