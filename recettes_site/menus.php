<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
	<link rel="stylesheet" href="css/menus.css" />
    <title>Menus</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<h1>Menus &amp; Thèmes</h1>
	<div id="form">
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
			</ul>
        </div>
	</div>
</body>
</html>