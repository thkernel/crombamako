<!DOCTYPE html>

<html>

<head>

    <title>Cinz@n.com</title>

</head>

<body>

	Bonjour, {{ $contribution->doctor->civility}} {{ $contribution->doctor->last_name}} <br />
	Vous avez reçu cet email suite au paiement de votre cotisation. <br />
	<b>Détails:</b><br />
	Réf: {{ $contribution->id }}<br />
    <b>Années payées:</b>
    <ul>
	    @foreach($contribution->contribution_items as $contribution_item)
	    	<li>{{$contribution_item->year}}</li>
	    @endforeach
	</ul>
	<b>Montant total: {{ $contribution->total_amount }} F CFA </b><br />

     
    L'Ordre des médecins vous remercie!

</body>

</html>