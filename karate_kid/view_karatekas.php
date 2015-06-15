<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Karatekas</h1>
	<form method="POST" action="view_karatekas_action.php">
		<?php
			$query = "SELECT id, id_club,dans,nom, poids, taille, dateNais, photo, ceinture
						FROM karateka
						ORDER BY id;";
			$reponse = pg_query($bdd,$query);
			
			echo "<select name='nom_karateka'>";
			while($data = pg_fetch_array($reponse)){
				echo "<option value='".$data['id']."'>".$data['nom']." (".$data['datenais'].")"."</option>";
			}
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>