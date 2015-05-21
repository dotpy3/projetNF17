<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter un karateka</h1>
		<form id="form_karateka" method="POST" action="add_karateka_action.php">
			<table>
				<tr><td>Nom :</td><td><input class="input" type="text" name="nom" required/></td></tr>
				<tr><td>Poids (en kilogrammes) :</td><td>
					<select name="poids"><?php $i=1; for($i=50;$i<251;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
				</td></tr>
				<tr><td>Taille (en centimètres) :</td><td>
					<select name="taille"><?php $i=1; for($i=150;$i<231;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
				</td></tr>
				<tr><td>Date de naissance :</td><td>
					<select name="naiss_jour"><?php $i=1;	for($i=1;$i<32;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					<select name="naiss_mois"><?php $i=1;	for($i=1;$i<13;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					<select name="naiss_annee"><?php $i=1;	for($i=1900;$i<2011;$i++){echo "<option value='".$i."'>".$i."</option>";}; ?></select>
					</td></tr>
				<tr><td>Ceinture :</td><td>
					<select name="ceinture">
						<option value="blanche">blanche</option>
						<option value="jaune">jaune</option>
						<option value="orange">orange</option>
						<option value="verte">verte</option>
						<option value="bleue">bleue</option>
						<option value="marron">marron</option>
						<option value="noire">noire</option>
					</select></td></tr>
				<tr><td>Dans (ceinture noire) :</td><td><input class="input" type="number" min="0" max="10" value="0" name="dans"/></td></tr>
				<tr><td>Photo :</td><td><input class="input" type="file" name="photo"/></td></tr>
				<tr><td>Katas maîtrisés :</td><td>/liste extraite + checkbox/</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>