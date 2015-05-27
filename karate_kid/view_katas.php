<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Katas</h1>
	<form method="POST" action="view_katas_action.php">
		<?php
			$query = "SELECT `id`, `nom_famille`,`nom_jap`,`nom_fr`
						FROM `kata`
						ORDER BY `id`,`nom_famille`,`nom_fr`,`nom_jap`";
			$reponse = $bdd->query($query);
			
			echo "<select name='nom_kata'>";
			while($data = $reponse->fetch()){
				echo "<option value='".$data['id']."'>".$data['nom_famille']." -- ".$data['nom_jap']." (".$data['nom_fr'].")"."</option>";
			}
			echo "</select><br/>";
		?>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>