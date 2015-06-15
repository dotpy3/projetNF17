<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Karatekas</h1>
	<form method="POST" action="view_clubs_action.php">
		<?php
			$query = "SELECT *
						FROM club
						ORDER BY id;";
			$reponse = pg_query($bdd,$query);
			
			echo "<select name='nom_club'>";
			while($data = pg_fetch_array($reponse)){
				echo "<option value='".$data['id']."'>".$data['nom']."</option>";
			}
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>