<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
    <link rel="stylesheet" href="css/vue_db.css" />
    <title>Vue d'ensemble</title>
</head>
<body>
	<?php include('include/menu.php') ?>
    <h1>Vue d'ensemble de la base de données</h1>
    <form id="form" method="post" action="recherche2.php">
        <div class="list_div">
            <h2>Ingrédients :</h2>
            <ul>
				<span>id.nom</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `ingredient`');	
	while ($data = $reponse->fetch()){
		echo "<li>";
		echo $data['id'];
		echo ". ";
		echo $data['nom'];
		echo"</li>";
	};
	$reponse->closeCursor();
?>
            </ul>
        </div>
		<div class="list_div">
            <h2>Thèmes :</h2>
            <ul>
				<span>id.nom</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `groupe_recettes` WHERE `type`="theme"');	
	while ($data = $reponse->fetch()){
		echo "<li>".$data['id'].". ".$data['nom']."</li>";
	};
	$reponse->closeCursor();
?>
        </div>
		<div class="list_div">
            <h2>Menus :</h2>
			<ul>
				<span>id.nom</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `groupe_recettes` WHERE `type`="menu"');	
	while ($data = $reponse->fetch()){
		echo "<li>".$data['id'].". ".$data['nom']."</li>";
	};
	$reponse->closeCursor();
?>
			</ul>
        </div>
        <div class="list_div" id="recettes">
            <h2>Recettes :</h2>
            <ul>
				<span>id.nom(prépa/cuisson/prs)</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `recette`');	
	while ($data = $reponse->fetch()){
		echo "<li>".$data['id'].". ".$data['nom']." (".$data['preparation']."'/".$data['cuisson']."'/".$data['nbPersonnes']." prs)</li>";
	};
	$reponse->closeCursor();
?>
            </ul>
        </div>
        <div id="etapes">
            <h2>Étapes :</h2>
            <ul class="list">
				<span>id-recette.ordre.étapes</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `etape` ORDER BY `id_recette`,`ordre`');	
	while ($data = $reponse->fetch()){
		echo "<li>(".$data['id_recette']."). ".$data['ordre']." : ".$data['action']."</li>";
	};
	$reponse->closeCursor();
?>
            </ul>
        </div>
    </form>
</body>
</html>