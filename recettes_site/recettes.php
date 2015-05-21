<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
	<link rel="stylesheet" href="css/recettes.css" />
    <title>Recettes</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<h1>Recettes</h1>
	<div id="form">
		<div class="list_div">
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
	</div>
</body>
</html>