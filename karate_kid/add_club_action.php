<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter un club</h1>
		<form method="POST" action="#">
			<table>
				<tr><td>Nom du club :</td><td><?php echo $_POST['nom']; ?></td></tr>
				<tr><td>Site web :</td><td><?php echo $_POST['siteweb']; ?></td></tr>
				<tr><td>Coordonnées :</td><td><?php echo $_POST['coordonnees']; ?></td></tr>
				<tr><td>Professeur :</td><td>
				<?php
					for ($i=0; $i<$_POST['i']; $i++){
						$indice="pr".$i;
						if($_POST[$indice]!=""){echo $_POST[$indice]."<br/>";};
					}
				?></td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>