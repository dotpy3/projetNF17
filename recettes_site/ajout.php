<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
	<link rel="stylesheet" href="css/ajout.css" />
    <title>Ajout</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<h1>Ajouter ...</h1>
	<form id="form" method="post" action="ajout2.php">
		<div class="list_div">
			<ul>
				<li><input type="radio" name="type_ajout" value="Recette" CHECKED />Recette</li>
				<li><input type="radio" name="type_ajout" value="Menu"/>Menu ou thème</li>
				<li><input type="radio" name="type_ajout" value="Ingrédient"/>Ingrédient</li>
			</ul>
		</div><br/>
        <input class="bouton_submit" type="submit" value="Ajouter" />
	</form>
    </div>
</body>
</html>