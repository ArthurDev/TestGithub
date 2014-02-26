<?php
session_start();

$_SESSION['prenom'] = $_POST['name'];
$_SESSION['age'] = 24;

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test', '', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Page protégée par mot de passe</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	</head>
	<body>
		<?php
		if (isset($_SESSION['prenom']))
		{
			echo '<p>salut à toi '.$_SESSION['prenom'].', soit le bienvenue !';
		}
		
		else
		{
		?>
		<p>Quel est ton nom</p>
		<form action="formulaire.php" method="post">
			<p>
			<input type="text" name="name" />
						<input type="text" name="name" />
			
			<input type="submit" value="Valider" />
			</p>
		</form>
		
		<?php
		
			}
		
		$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) 
					VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');
		
		$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
		$req->execute(array($_GET['possesseur'], $_GET['prix_max']));
		
		echo '<ul>';
		while ($donnees = $req->fetch())
		{
			echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
		}
		echo '</ul>';
		
		$req->closeCursor();
		

	
		
		$reponse4 = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console=\'Xbox\' OR console=\'PS2\' ORDER BY prix DESC LIMIT 0,10');
		
		while ($donnees = $reponse4->fetch())
		{
			echo '<p>Le jeu : ' . $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . ' fonctionne sur ' . $donnees['console'] . ' et coute ' . $donnees['prix'] . ' EUR<br /></p>';
		}
		
		$reponse4->closeCursor();
		
		
		// On récupère tout le contenu de la table jeux_video
		$reponse = $bdd->query('SELECT * FROM jeux_video LIMIT 0,5');
		
		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
		?>
		    <p>
		    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
		    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
		    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
		    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
		   </p>
		<?php
		}
		
		$reponse->closeCursor(); // Termine le traitement de la requête
		
		$reponse2 = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Patrick\' AND prix < 20 LIMIT 0,6');
		
		while ($donnees = $reponse2->fetch())
		{
			echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
		}
		
		$reponse2->closeCursor();
		
		$reponse3 = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY prix LIMIT 0,5');
		
		while ($donnees = $reponse3->fetch())
		{
			echo $donnees['nom'] . ' coûte ' . $donnees['prix'] . ' EUR<br />';
		}
		
		$reponse3->closeCursor();
		
		?>

		<p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
		<a href="lien1.php">lien 1</a>
	</body>
</html>