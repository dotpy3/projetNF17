<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Compétitions</h1>
	<form method="POST" action="view_classements_action.php">
		<?php
			$query = "SELECT * FROM competition_katas 
					  UNION SELECT * FROM competition_kumite
					  UNION SELECT * FROM competition_mixte
					  UNION SELECT * FROM competition_tameshi_wari;"; //UNION de toutes les tables de compétitions
			$reponse = pg_query($bdd,$query);
			
			echo "<select name='nom_competition'>";
			while($data = pg_fetch_array($reponse)){
				echo "<option value='".$data['nom']."'>".$data['nom']."</option>";
			}
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>
