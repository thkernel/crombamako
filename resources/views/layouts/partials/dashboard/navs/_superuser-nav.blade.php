<!-- ########## START: LEFT PANEL ########## -->

<ul class="br-sideleft-menu">
  <li class="br-menu-item">
    
    <a class="br-menu-link" href="{{ route('dashboard') }}">
      <i class="fa fa-home tx-20"></i><span class="menu-item-label"> Tableau de bord</span>
    </a>

  </li><!-- br-menu-item -->

  
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('structures.index') }}">
      <i class="fa fa-building-o tx-20" aria-hidden="true"></i> <span class="menu-item-label">Structures</span>
    
    </a>

  </li><!-- br-menu-item -->
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('dashboard') }}">
      <i class="fa fa-users tx-20" aria-hidden="true"></i> <span class="menu-item-label">Médecins</span>
    
    </a>

  </li><!-- br-menu-item -->
  <li class="br-menu-item">
    

    <a class="br-menu-link" href="{{ route('opportunities.index') }}">
      <i class="fa fa-cubes tx-20" aria-hidden="true"></i> <span class="menu-item-label">Opportunités</span>
    
    </a>

  </li><!-- br-menu-item -->
  



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
                <a class="sub-link" href="{{ route('specialities.index') }}">Spécialités</a>
            </li>
        
           

             
          </ul>
        </li>


       
      </ul><!-- br-sideleft-menu -->

      
       
        
  

    <!-- ########## END: LEFT PANEL ########## -->

    