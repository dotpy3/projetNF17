<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
	<link rel="stylesheet" href="css/ingredients.css" />
    <title>Ingrédients</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<h1>Ingrédients</h1>
	<div id="form">
		<div class="list_div">
			<ul>
				<span>id.nom</span>
<?php
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
	$reponse = $bdd->query('SELECT * FROM `ingredient`');	
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