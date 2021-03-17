@extends("layouts.document_request")

@section("content")
	<div class="container">
		
		<!-- Document Header -->
		<div class="document-head">
			<div class="head-section-1">
				<p>
					Demande manuscrite timbrée à 200F adressée à {{ $document_request->recipient_civility }} le Ministre de la Santé et du Développement  Social
				</p>
			</div>

			<div class="border-wrapper">

				<div class="head-section-2">
					<!-- Left content -->
					<div class="head-left-content">
						<b>Dr {{ $document_request->doctor->full_name }}</b>	<br />			
						Médecin {{ $document_request->doctor->speciality->name}} <br />
						{{ $document_request->doctor->neighborhood->name}}, {{ $document_request->doctor->town->name}}<br />       
						Tél. : {{ $document_request->doctor->phone}}  <br />
						Email: {{ $document_request->doctor->email}} <br />

					</div>


					<!-- Right content -->
					<div class="head-right-content">
						Bamako, le {{ format_date($document_request->created_at, 'd/m/Y' ) }}<br />
					</div>
				</div>
			

				<div class="document-body">
					<div class="stamped-and-recipient">
						<!-- Left content -->
						<div class="stamped">
							TIMBRE FISCAL DE 200F

						</div>


						<!-- Right content -->
						<div class="recipient">
							<p class="to">A </p>
							{{ $document_request->recipient_civility }} le
							{{ $document_request->recipient_function }}
						</div>
					</div>

					<div class="document-object">
						<p>
							<u>Objet:</u> {{ $document_request->document_type->name }}
						</p>
					</div>

					<div class="document-content">
						<p>
							{{ $document_request->recipient_civility }} le Ministre, <br />

							J’ai l’honneur de solliciter auprès de votre haute bienveillance l’octroi d’un agrément pour l’exercice privé de la profession médicale. <br /> <br />
							                                                                                                                                                                                                                                                                  
							Espérant une suite favorable, veuillez agréer, {{ $document_request->recipient_civility }} le Ministre, l’expression de ma très haute considération.
						</p>
					</div>

					<div class="document-doctor-signature">
						<div class="doctor-signature">
							<u>
							<b>Dr {{ $document_request->doctor->full_name }}</b>	<br />		
							</u>	
						</div>
					</div>


					<div class="document-pieces">
						<ol><b><u>Pièces jointes :</u> </b>

						    <li>Copie certifiée de l’Attestation de Réussite au Doctorat en Médecine. Pour le diplôme étranger l’intéressé (e) doit fournir l’équivalence du diplôme et les 2 doivent être certifiés ;</li>
						    <li> Certificat de nationalité ou d’un pays accordant la réciprocité ;</li>
						    <li> Certificat de résidence datant moins de 3 mois ;</li>
						    <li> Extrait de naissance ; </li>
						    <li> Casier judiciaire datant moins de 3 mois ;</li>
						    <li> Copie certifiée de l’attestation d’inscription à l’Ordre des Médecins ;</li>
						    <li> Curriculum vitae (CV) ;</li>
						    <li> Arrêté de mise en retraite ou arrêté de mise en départ volontaire.</li>
						    <li> Attestation sur l'honneur d'aucun emploi public </li>
					    </ol>

					</div>
				</div>
			</div>

			<div class="document-nb">
				NB : Condition de traitement du dossier : être à jour de ses cotisations annuelles.
			</div>
		</div>
	</div>
@endsection