<html>
<head>
	<?php include("include/head.php"); ?>
	<link rel="stylesheet" href="form.css"/>
	<title>Ajouter un personnage</title>
</head>
<body>
	<?php include("include/menu.php"); ?>
	
	<h1>Ajouter un personnage</h1>
	
	<form method="post" action="ajout_personnage_action.php" >
		Nom du personnage (titre) : <input name="titre" class="champ" size="50"/><br/>
		<fieldset id="carac_generales">
			<legend>Caractéristiques générales</legend>
			Âge :<input name="age" class="champ"/><br/>
			Race :<input name="race" class="champ"/><br/>
			Faction :<input name="faction" class="champ"/><br/>
			Origine :<input name="origine" class="champ"/><br/>
			Cheveux :<input name="cheveux" class="champ"/><br/>
			Yeux :<input name="yeux" class="champ"/><br/>
			Armures :<input name="armure" class="champ"/><br/>
			Armes :<input name="arme" class="champ"/><br/>
			Monture :<input name="monture" class="champ"/><br/>
		</fieldset>
		<fieldset id="descr_precise">
			<legend>Description précise</legend>
			Physique :<textarea class="textarea_petite" name="physique"></textarea><br/>
			Caractère :<textarea class="textarea_petite" name="caractere"></textarea><br/>
			Relations :<textarea class="textarea_petite" name="relations"></textarea><br/>
		</fieldset>
		
		<fieldset id="contenu">
			<legend>Contenu</legend>
			<textarea id="textarea_grande" name="contenu"></textarea><br/><br/>
		</fieldset>
		
		<fieldset id="buttons">
			<input class="button" type="submit" value="Ajouter"/>
			<input class="button" type="reset" value="Supprimer"/>
		</fieldset>
	</form>
</body>
</html>