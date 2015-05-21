<html>
<head>
	<?php include("include/head.php"); ?>
	<link rel="stylesheet" href="personnages.css"/>
	<title><?php echo $_POST['titre']; ?></title>
</head>
<body>
	<?php include("include/menu.php"); ?>
	
	<h1><?php echo $_POST['titre']; ?></h1>
	<hr/>
	
	<img id="persopic" src="images/test.png"/> 
	
	<div class="bloc_descriptif">
		<table>
			<tr><td class="cg">Âge : </td><td class="cd"><?php echo $_POST['age'];?></td></tr>
			<tr><td class="cg">Race : </td><td class="cd"><?php echo $_POST['race'];?></td></tr>
			<tr><td class="cg">Faction : </td><td class="cd"><?php echo $_POST['faction'];?></td></tr>
			<tr><td class="cg">Origine : </td><td class="cd"><?php echo $_POST['origine'];?></td></tr>
			<tr><td class="cg">Cheveux : </td><td class="cd"><?php echo $_POST['cheveux'];?></td></tr>
			<tr><td class="cg">Yeux : </td><td class="cd"><?php echo $_POST['yeux'];?></td></tr>
			<tr><td class="cg">Armures : </td><td class="cd"><?php echo $_POST['armure'];?></td></tr>
			<tr><td class="cg">Armes : </td><td class="cd"><?php echo $_POST['arme'];?></td></tr>
			<tr><td class="cg">Monture : </td><td class="cd"><?php echo $_POST['monture'];?></td></tr>
		</table>
	</div>
	
	<div class="bloc_descriptif2">
		<table>
			<tr><td class="cg">Physique : </td><td class="cd2"><?php echo $_POST['physique'];?></td></tr>
			<tr><td class="cg">Caractère : </td><td class="cd2"><?php echo $_POST['caractere'];?></td></tr>
			<tr><td class="cg">Relation </td><td class="cd2"><?php echo $_POST['relations'];?>
			</td></tr>
		</table>
	</div>
	
	<div class="last_block">
		<?php echo $_POST['contenu'];?>
	</div>
	
	<div class="last_block">
		Articles liés
	</div>
	
</body>
<html>