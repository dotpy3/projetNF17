<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Inscription</h1>
		<form method="POST" action="inscription2.php">
			<table>
				<tr><td>Nom karateka :</td><td>
					<?php
						$query = "SELECT id,nom, dateNais
									FROM karateka
									ORDER BY id;";
						$reponse = pg_query($bdd,$query);
						
						echo "<select name='id_karateka'>";
						while($data = pg_fetch_array($reponse)){
							echo "<option value='".$data['id']."'>".$data['nom']." (".$data['datenais'].")"."</option>";
						}
						echo "</select><br/>";
					?>		
				</td></tr>
				<tr><td>Nom de la compétition :</td><td>
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
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>
