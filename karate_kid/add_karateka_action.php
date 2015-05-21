<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter un karateka</h1>
		<form method="POST" action="#">
			<table>
				<tr><td>Nom :</td><td><?php echo $_POST['nom']; ?></td></tr>
				<tr><td>Poids :</td><td><?php echo $_POST['poids']." kg"; ?></td></tr>
				<tr><td>Taille :</td><td><?php if(isset($_POST['taille'])){echo $_POST['taille']." cm";} else {echo "erreur taille";} ?></td></tr>
				<tr><td>Date de naissance : </td><td><?php
					if(isset($_POST['naiss_jour'])){echo $_POST['naiss_jour']." / ";} else {echo "erreur date";}
					if(isset($_POST['naiss_mois'])){echo $_POST['naiss_mois']." / ";} else {echo "erreur date";}
					if(isset($_POST['naiss_annee'])){echo $_POST['naiss_annee'];} else {echo "erreur date";}
				?></td></tr>
				<tr><td>Ceinture :</td><td><?php if(isset($_POST['ceinture'])){echo $_POST['ceinture'];} else{echo "erreur ceinture";}; ?></td></tr>
				<?php if($_POST['ceinture']=="noire"){echo "<tr><td>Dans :</td><td>".$_POST['dans']."</td></tr>";};?>
				<tr><td>Photo :</td><td><?php if(isset($_POST['photo'])){echo $_POST['photo'];} else{echo "pas de photo";}; ?></td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>