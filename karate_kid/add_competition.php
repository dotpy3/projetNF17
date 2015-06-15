<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter une competition</h1>
		<form method="POST" action="add_competition_action.php">
			<table>
				<tr><td>Nom :</td><td><input class="input" type="text" name="nom" required/></td></tr>
				<tr><td>Type de tournoi :</td><td>
					<select class="input" name="type">
						<option value="mixte">mixte</option>
						<option value="kumite">kumite (combat)</option>
						<option value="katas">katas (démonstration chorégraphiée)</option>
						<option value="tameshi_wari">tameshi wari (cassage de planches)</option>
					</select>
				</td></tr>
				<tr><td>Date :</td><td>
					<select name="date_jour"><?php $i=1;	for($i=1;$i<32;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					<select name="date_mois"><?php $i=1;	for($i=1;$i<13;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					<select name="date_annee"><?php $i=1;	for($i=1900;$i<2016;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					</td></tr>
				<tr><td>Club organisateur :</td><td>
					<?php
						$query = "SELECT * FROM club ;";
						$reponse = pg_query($bdd,$query);
						echo "<select name = 'id_club'>";
						while($data = pg_fetch_array($reponse)){
							echo "<option value='".$data["id"]."'>".$data["nom"]."</option>";
						}
						echo "</select>";
					?>
				</td></tr>
				<tr><td>Lieu :</td><td><input class="input" type="text" name="lieu" required/></td></tr>
				<tr><td>Site web :</td><td><input class="input" type="text" name="website" required/></td></tr>
				<tr><td>Contact :</td><td><input class="input" type="text" name="contact" required/></td></tr>
				<tr><td>Photos :</td><td><input class="input" type="file" name="photos"/></td></tr>
				<tr><td>Mouvements interdits (kumite) :</td><td>
					<?php
						echo "<input type='checkbox' name='mains' value='mains'/>Mains<br/>";
						echo "<input type='checkbox' name='pieds' value='pieds'/>Pieds<br/>";
						echo "<input type='checkbox' name='coudes' value='coudes'/>Coudes<br/>";
						echo "<input type='checkbox' name='genoux' value='genoux'/>Genoux<br/>";
					?></td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>