<html>
<head>
	<?php include("include/head.php"); ?>
	<link rel="stylesheet" href="personnages.css"/>
	<title>Personnages Secondaires</title>
</head>
<body>
	<?php include("include/menu.php"); ?>
	
	<h1>Personnages Secondaires</h1>
	<hr/>
	<div id="content_secondaires">
		<table id="secondaires">
			<tr id="ligne0"><td>Nom</td><td>Origine</td><td>Détails</td></tr>
			<?php 
				$bdd = new PDO('mysql:host=localhost; dbname=kitsune; charset=utf8', 'root', '');
				$reponse= $bdd->query('SELECT * FROM personnages_secondaires');
				while($donnees = $reponse->fetch())
				{
					echo '<tr><td class="col1" id="'.$donnees['ancre'].'">'.$donnees['nom'].'</td><td>'.$donnees['origine'].'</td><td>'.$donnees['details'].'</td></tr>';
				}
				echo "</ul>";
				$reponse->closeCursor();
			?>
		</table>
	</div>
	
</body>
<html>