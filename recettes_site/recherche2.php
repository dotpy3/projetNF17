<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
    <link rel="stylesheet" href="css/recherche.css" />
    <title>Recherche</title>
</head>
<body>
	<?php include('include/menu.php') ?>
    <h1>Résultats de la recherche</h1>
    <div id="form">
        <div class="list_div" id="list_type">
            <h2>Type :</h2>
            <ul>
					<?php 
					if(!isset($_POST['type'])){
						echo "<i><li>• Apéritif</li><li>• Entrée</li><li>• Plat Principal</li><li>• Dessert</li><li>• Viande</li><li>• Poisson</li></i>";
					}
					else{
						foreach($_POST['type'] as $valeur){echo "<li>• $valeur</li>";};
					};
					?>
            </ul>
        </div><br/>
        <div class="list_div">
            <h2>Menu :</h2>
				<ul class="list">
					<?php 
					if(!isset($_POST['menu'])){
						echo "<i>Tous</i>";
					}
					else{
						foreach($_POST['menu'] as $valeur){echo "<li>• $valeur</li>";};
					};
					?>
				</ul>
        </div>
        <div class="list_div">
            <h2>Thème :</h2>
				<ul class="list">
					<?php 
					if(!isset($_POST['theme'])){
						echo "<i>Tous</i>";
					}
					else{
						foreach($_POST['theme'] as $valeur){echo "<li>• $valeur</li>";};
					};
					?>
				</ul>
        </div>
        <div class="list_div">
            <h2>Ingrédients :</h2>
				<ul class="list">
					<?php 
					if(!isset($_POST['ingredient'])){
						echo "<i>Tous</i>";
					}
					else{
						foreach($_POST['ingredient'] as $valeur){echo "<li>• $valeur</li>";};
					};
					?>
				</ul>
        </div>
		<br/>
		<div class="list_div" id="list_motcles">
            <h2>Mots-Clés :</h2>
			<input id="cadre_motscles" name="motscles" DISABLED
				<?php
				echo "value='";
				if(isset($_POST['motscles'])){echo $_POST['motscles'];}
				else{echo "Aucun";};
				echo "' />";
				?>        
		</div>
		<br />
		<div id="resultats_div">
			<h2>Résultats</h2>
			<ul>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
				<li><a href="#">Recette-résultat</a></li>
			</ul>
		</div>
		<br />
		<input type="button" class="bouton_submit" id="bouton_retour" value="Retour au formulaire de Recherche" onclick="history.go(-1)">
    </div>
</body>
</html>