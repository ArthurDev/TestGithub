<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Codes d'accès au serveur central de la NASA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	</head>
	<body>
    
        <?php
	if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou") // Si le mot de passe est bon
	{
	// On affiche les codes
	?>
		<h1>Voici les codes d'accès :</h1>
		<p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
		
		<p>
		Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
		La NASA vous remercie de votre visite.
		</p>
        <?php
	}
	else // Sinon, on affiche un message d'erreur
	{
		echo '<p>Mot de passe incorrect</p>';
	}
	?>
	
        
	</body>
</html>