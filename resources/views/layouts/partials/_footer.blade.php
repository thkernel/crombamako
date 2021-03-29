
<div class="footer-one">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-widget">
				<h4 class="footer-widget-title">A propos</h4>
				<p class="footer-widget-content">
					Cinz@n-GGSP est une base de données de Gestion Géolocalisée des Structures et Professionels de santé.
				</p>
			</div>
			
            
			
			

			<!-- Footer widget 4 -->
			<div class="col-md-4 footer-widget">
				<h4 class="footer-widget-title"> Liens utiles</h4>
				<div class="footer-widget-content">
					<ul>
						
					
						<li><a href="{{ route('all_posts_path') }}">Actualité</a></li>
						<li><a href="{{ route('faq_path') }}">Foire Aux Questions</a></li>
						<li><a href="{{ route('cgu_path') }}">Conditions d'utilisation</a></li>
						<li><a href="{{ route('privacy_policy_path') }}">Politique de confidentialité</a></li>
					
					</ul>
					
				</div>

				<div class="playstore">
						
					</div>
			</div>


			<!-- Footer widget 4 -->
			<div class="col-md-4 footer-widget">
				<h4 class="footer-widget-title"> Contacts</h4>
				<div class="footer-widget-content">
					@if (hasOrganization())
					<div class="addresses">
            			<h6 class="">Téléphone: {{ organization()->phone_1 }} / {{ organization()->phone_2 }}</h6>
            			<h6 class="">Fax: {{ organization()->fax}} , BP: {{ organization()->po_box}}</h6>
            			<h6 class="">Email: {{ organization()->email}}</h6>
            		<h6 class="">Adresse: {{ organization()->address}}</h6>
          			</div>
          			@endif
				</div>

				
			</div>


		</div>

		<div class="row mg-t-20">
			<div class="col-md-12 copyright text-center">
				&copy;2021 Conseil Régional de l'Ordre des Médecins de Bamako - Tous droits réservés - Designed by <a href="http://www.certesmali.org/" target="_blank">CERTES</a>
			</div>

			<!-- 
			<div class="col-md-2">
				<div class="social-link">
					<div class="text-center">
	                
	                
	                <a href="https://www.facebook.com/" class="btn btn-social-icon btn-facebook" target="_blank"><i class="fa fa-facebook"></i>
	                </a>
	              
	                
	                

	                <a href="https://www.instagram.com/" class="btn btn-social-icon btn-instagram" target="_blank"><i class="fa fa-instagram"></i></a>

	                <a href="https://www.linkedin.com/" class="btn btn-social-icon btn-linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
	               
	                <a href="https://twitter.com/" class="btn btn-social-icon btn-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
	                
	              </div>
				</div>
			</div>
		-->

		</div>

	</div>
</div>
