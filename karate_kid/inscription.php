<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Inscription</h1>
		<form method="POST" action="add_karateka_action.php">
			<table>
				<tr><td>Nom karateka :</td><td>
					<?php
						$query = "SELECT `id`,`nom`, `dateNais`
									FROM `karateka`
									ORDER BY `id`;";
						$reponse = $bdd->query($query);
						
						echo "<select name='nom_karateka'>";
						while($data = $reponse->fetch()){
							echo "<option value='".$data['id']."'>".$data['nom']." (".$data['dateNais'].")"."</option>";
						}
						echo "</select><br/>";
					?>		
				</td></tr>
				<tr><td>Nom de la compétition :</td><td>
					<?php
						$query = "SELECT * FROM competition_katas, competition_kumite, competition_mixte, competition_tameshi_wari;"; //Regroupement logique ? Produit cartésien ? Join (INNER / OUTER)?
						$reponse = $bdd->query($query);
						
						echo "<select name='nom_competition'>";
						while($data = $reponse->fetch()){
							echo "<option value='".$data['nom']."'>".$data['nom']." (".$data['dateComp'].")"."</option>";
						}
						echo "</select><br/>";
					?>		
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>