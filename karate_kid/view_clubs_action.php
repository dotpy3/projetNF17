<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<?php
			$id_club = $_POST['nom_club'];
			$query = "SELECT * FROM club WHERE `id`=".$id_club.";";
			$reponse = $bdd->query($query);
			$data = $reponse->fetch();
			
			echo "<h1>Fiche de ".$data['nom']."</h1>";
			echo "<form> <!-- pour la couleur du background uniquement - pas de method ou d'action -->
					<table>
						<tr><td>Nom :</td><td>".$data['nom']."</td></tr>
						<tr><td>Site web :</td><td>".$data['site_web']."</td></tr>
						<tr><td>Coordonnées du dirigeant :</td><td>".$data["coordonnee_dir"]."</td></tr>
						<tr><td>Professeurs :</td><td>";
					$query = "SELECT * FROM club, professeur WHERE club.`id`=".$id_club." AND professeur.`id_club`=".$id_club.";";
					$reponse = $bdd->query($query);
					while($data = $reponse->fetch()){
						echo $data['nom']."<br/>";
					}
			echo "</td></tr>
				</table><br/>";
		?>
		<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>