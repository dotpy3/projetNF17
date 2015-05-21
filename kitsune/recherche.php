<html>
<head>
	<?php include("include/head.php"); ?>
	<title>Recherche</title>
	<link rel="stylesheet" href="recherche.css"/>
</head>
<body>
	<?php include("include/menu.php"); ?>
	
	<!-- DEBUT ECRITURE CONTENU DE LA PAGE -->
	<div id="titre">Recherche</div>
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
	
	<div class="rangement" id="lieux"><h4>Lieux</h4>
		<h5>Royaumes</h5>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query("SELECT * FROM `lieux` WHERE `type`='royaume' ");
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="'.$donnees['pagename'].'.php">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
		
		<h5>Villes</h5>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query("SELECT * FROM `lieux` WHERE `type`='ville' ");
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="'.$donnees['pagename'].'.php">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
		
		<h5>Monuments</h5>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query("SELECT * FROM `lieux` WHERE `type`='monument' ");
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="'.$donnees['pagename'].'.php">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
		
		<h5>Forêts</h5>
		<?php 
		$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
		$reponse= $bdd->query("SELECT * FROM `lieux` WHERE `type`='foret' ");
		echo "<ul>";
		while($donnees = $reponse->fetch())
		{
			echo '<li><a href="'.$donnees['pagename'].'.php">'.$donnees['nom'].'</a></li>';
		}
		echo "</ul>";
		$reponse->closeCursor();
		?>
		
	</div>
	<div class="rangement" id="types"><h4>Types</h4></div>
	<div class="rangement" id="divers"><h4>Divers</h4></div>
	<div class="rangement"><h4>Autre 1</h4></div>
	<div class="rangement"><h4>Autre 2</h4></div>
</body>
<html>