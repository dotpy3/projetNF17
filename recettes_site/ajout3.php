<!DOCTYPE html>

<?php
	if(isset($_POST['type_ajout']))
		$typeAjout=$_POST['type_ajout'];
	else
		$typeAjout="erreur";
	
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
	<link rel="stylesheet" href="css/ajout3.css" />
    <title>Ajout</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<h1>Ajouter
		<?php echo $typeAjout; ?>
	</h1>
	<?php
		switch ($typeAjout){
			
/* -------------------------------------------------- INGRÉDIENT -------------------------------------------------- */
			case "Ingrédient":
				echo "<div id='form'>";
					echo "<h2>Faire vérification d'existence de l'ingrédient dans la table.<br/>
					Si existant -> dire qu'une occurence existe déjà + 2 boutons, retour au menu OU ajouter un autre ingrédient<br/>
					Si non existant -> ne rien afficher et proposer une validation</h2>";
					echo "<div class='list_div'>";
						echo "Nom de l'ingrédient : ".$_POST['nom'];
					echo "</div>";
				echo "</div>";
				break;
		}
	?>
</body>
</html>