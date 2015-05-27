<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Choisir match</h1>
	<form method="POST" action="suivi_competitions_action2.php">
		<table>
			<tr><td>Compétition :</td><td><?php $nom_comp = $_POST['nom_competition']; echo $nom_comp; ?></td></tr>
			<?php
				//récupérer type de la compétition sélectionnée
				$query="SELECT *
						FROM `match_katas`
						WHERE `nom_competition`=".$nom_comp."
						ORDER BY `nom`;";
				$reponse = $bdd->query($query);
//				while($data = $reponse->fetch()){ echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
			?>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>