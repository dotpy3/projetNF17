<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Fiche de *nom*</h1>
			<form> <!-- pour la couleur du background -->
				<table>
				<tr><td>Nom :</td><td>/extraire nom/</td></tr>
				<tr><td>Poids (en kilogrammes) :</td><td>/extraire poids/</td></tr>
				<tr><td>Taille (en centimètres) :</td><td>/extraire taille/</td></tr>
				<tr><td>Date de naissance :</td><td>/extraire date de naissance + calculer âge/</td></tr>
				<tr><td>Ceinture :</td><td>/extraire couleur de la ceinture/</td></tr>
				<tr><td>Dans (ceinture noire) :</td><td>Si ceinture noire /extraire dans/</td></tr>
				<tr><td>Photo :</td><td>/extraire photo/</td></tr>
				<tr><td>Katas maîtrisés :</td><td>/liste extraite/</td></tr>
				<tr><td>Historique :</td><td>
					<table border="1">
						<tr><th>nom compet</td><th>classement</th><th>score</th>
					</table>
				</td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			</form>
	</div>
</body>
<?php include("include/foot.php"); ?>