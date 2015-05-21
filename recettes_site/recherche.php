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
    <h1>Recherche</h1>
    <form id="form" method="post" action="recherche2.php">
        <div class="list_div" id="list_type">
            <h2>Type :</h2>
            <ul>
				<li><input type="checkbox" name="type[]" value="Apéritif"/>Apéritif</li>
                <li><input type="checkbox" name="type[]" value="Entrée"/>Entrée</li>
				<li><input type="checkbox" name="type[]" value="Plat Principal"/>Plat Principal</li>
				<li><input type="checkbox" name="type[]" value="Dessert"/>Dessert</li>
				<li><input type="checkbox" name="type[]" value="Viande"/>Viande</li>
				<li><input type="checkbox" name="type[]" value="Poisson"/>Poisson</li>
            </ul>
        </div>
		<br />
        <div class="list_div">
            <h2>Menu :</h2>
            <ul class="list">
                <li><input type="checkbox" name="menu[]" value="Anniversaire Achille 2013"/>Anniversaire Achille 2013</li>
                <li><input type="checkbox" name="menu[]" value="Fête des Mères 2014"/>Fête des Mères 2014</li>
                <li><input type="checkbox" name="menu[]" value="Full Muffins"/>Full Muffins</li>
            </ul>
        </div>
        <div class="list_div">
            <h2>Thème :</h2>
            <ul class="list">
                <li><input type="checkbox" name="theme[]" value="Noël">Noel</li>
                <li><input type="checkbox" name="theme[]" value="Halloween">Halloween</li>
                <li><input type="checkbox" name="theme[]" value="Croque-Monsieur">Croque-Monsieur</li>
                <li><input type="checkbox" name="theme[]" value="Harry Potter">Harry Potter</li>
                <li><input type="checkbox" name="theme[]" value="Alice au Pays des Merveilles">Alice au Pays des Merveilles</li>
            </ul>
        </div>
        <div class="list_div">
            <h2>Ingrédients :</h2>
            <ul class="list">
                <li><input type="checkbox" name="ingredient[]" value="Tomate">Tomate</li>
                <li><input type="checkbox" name="ingredient[]" value="Raisin">Raisin</li>
                <li><input type="checkbox" name="ingredient[]" value="Maïs">Maïs</li>
                <li><input type="checkbox" name="ingredient[]" value="Chocolat">Chocolat</li>
                <li><input type="checkbox" name="ingredient[]" value="Farine">Farine</li>
                <li><input type="checkbox" name="ingredient[]" value="Sucre">Sucre</li>
				<li><input type="checkbox" name="ingredient[]" value="Oeufs">Oeufs</li>
				<li><input type="checkbox" name="ingredient[]" value="Salade">Salade</li>
				<li><input type="checkbox" name="ingredient[]" value="Bacon">Bacon</li>
				<li><input type="checkbox" name="ingredient[]" value="Yaourt">Yaourt</li>
				<li><input type="checkbox" name="ingredient[]" value="Fruits">Fruits</li>

            </ul>
        </div><br />
        <div class="list_div" id="list_motcles">
            <h2>Mots-Clés :</h2>
            <input id="cadre_motscles" name="motscles" />
        </div> <br />
        <input class="bouton_submit" type="submit" value="Recherche" />
        <input class="bouton_submit" type="reset" value="Effacer" />
    </form>
</body>
</html>