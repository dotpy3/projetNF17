<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Fiche du kata *nom*</h1>
			<form> <!-- pour la couleur du background -->
				<table>
				<tr><td>Nom de la famille :</td><td>/extraire nom en japonais (+ nom en français entre parenthèses)/</td></tr>
				<tr><td>Nom du kata :</td><td>/extraire noms*2/</td></tr>
				<tr><td>Description :</td><td>/extraire description/</td></tr>
				<tr><td>Vidéo(s) :</td><td>/extraire vidéos de présentation/</td></tr>
				<tr><td>Schéma(s) :</td><td>/extraire schémas/</td></tr>
				<tr><td>Nombre de mouvements :</td><td>/extraire nombre de mouvements/</td></tr>
				<tr><td>Mouvements :</td><td>/extraire mouvements/</td></tr>
				<tr><td>Ceinture :</td><td>/extraire ceinture/</td></tr>
				<tr><td>Nombre de dans :</td><td>/extraire nombre de dans (si ceinture noire)/</td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			</form>
	</div>
</body>
<?php include("include/foot.php"); ?>