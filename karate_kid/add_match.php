<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Ajouter un match</h1>
	<form method="POST" action="add_match_action.php">
		<?php
			$query = "SELECT * FROM competition_katas, competition_kumite, competition_tameshi_wari, competition_mixte ;";
			$reponse = pg_query($bdd,$query);
			
			echo "<select name='id_competition'>";
			echo "<option>A COMPLÉTER</option>";
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>