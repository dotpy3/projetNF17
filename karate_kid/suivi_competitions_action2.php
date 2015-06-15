<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Declarer le vainqueur</h1>
	<form method="POST" action="suivi_competition_action3.php">
		<table>
			<tr><td>Compétition :</td><td><?php echo $_POST['competition']; ?></td></tr>
			<?php
				for($i=0; $i<5; $i++){
					echo "<tr><td>
						<select name='karateka_nom".$i."'>
							<option>Liste karatekas</option>
						</select>
						</td><td>";
					$query = "SELECT *
								FROM `competition_`".$comp_type."
								ORDER BY `id`;";
					$reponse = $bdd->query($query);
					
					echo "<select name='nom_karateka'>";
					while($data = $reponse->fetch()){
						echo "<option value='".$data['id']."'>".$data['nom']." (".$data['dateNais'].")"."</option>";
					}
					echo "</select><br/>";
			}
			?>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>