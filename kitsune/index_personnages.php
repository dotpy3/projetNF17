<html>
<head>
	<?php include("include/head.php"); ?>
	<title>Personnages</title>
	<link rel="stylesheet" href="recherche.css"/>
</head>
<body>
	<?php include("include/menu.php"); ?>
	
	<!-- DEBUT ECRITURE CONTENU DE LA PAGE -->
	<div id="titre">Liste des personnages</div>
	<div class="rangement" id="personnages"><h4>Personnages Principaux</h4>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query('SELECT * FROM personnages');
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="'.$donnees['pagename'].'.php">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
	</div>
	
	<div class="rangement" id="lieux"><h4>Personnages Secondaires</h4>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query('SELECT * FROM personnages_secondaires');
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="personnages_secondaires.php#'.$donnees['ancre'].'">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
	</div>
	
</body>
<html>