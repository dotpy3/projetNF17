<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<?php
			$id_kata = $_POST['nom_kata'];
			$query = "SELECT * FROM kata WHERE id=".$id_kata.";";
			$reponse = pg_query($bdd,$query);
			$data = pg_fetch_array($reponse);
			
			echo "<h1>Fiche du kata ".$data['nom_jap']." <br/>(".$data['nom_fr'].")</h1>";
			echo "<form> <!-- pour la couleur du background uniquement - pas de method ou d'action -->
					<table>
						<tr>
							<td>Nom de la famille :</td><td>".$data['nom_famille']."</td></tr>
							<tr><td>Nom du kata (traduction) :</td><td>".$data['nom_jap']." (".$data['nom_fr'].")</td></tr>
							<tr><td>Description :</td><td>";
							if($data['description']!=NULL) echo $data['description']; else echo "[pas e vidéo disponible]";
			echo 			"</td></tr>
							<tr><td>Ceinture minimum requise :</td><td>".$data['ceinture']."</td></tr>";
			if($data['ceinture']=='noire')
			echo			"<tr><td>Nombre de dans :</td><td>".$data['dans']."</td></tr>";
			echo			"<tr><td>Vidéo(s) :</td><td><a href='".$data['videos']."'>lien</a></td></tr>
							<tr><td>Schéma :</td><td><img src='".$data['schema']."' alt='[schéma descriptif absent]'/></td></tr>";
							
			$query = "SELECT COUNT(*) FROM mvt_ordre_katas WHERE id_kata=".$id_kata.";";
			$reponse = pg_query($bdd,$query);
			$data = pg_fetch_array($reponse);							
			if($data['count']==0){ //Si le kata ne possède aucun mouvement répertoriés (cas de db non complète), on le signale
				echo "<tr><td>Mouvements :</td><td>[/!\ non répertoriés dans la base]";
			} 
						
			else{ //si le kata possède effectivement une liste (supposée complète) de ses mouvements, on l'affiche ainsi que le nombre de ses mouvements'
				echo "<tr><td>Nombre de mouvements :</td><td>";
				echo $data['count'];
				echo "</td></tr>
					<tr><td>Mouvements :</td><td>";
						
				$query = "SELECT * FROM mvt_ordre_katas WHERE id_kata=".$id_kata." GROUP BY ordre, nom_mouvement, id_kata;";
				$reponse = pg_query($bdd,$query);
				echo "<table class='tab_ii'><th>Ordre</th><th>Mouvement</th></tr>";
				while($data = pg_fetch_array($reponse)){
					echo "<tr><td>".$data['ordre']."</td><td>".$data['nom_mouvement']."</td></tr>";
				}
				echo "</table>";}
								
			echo "</td></tr>
					</table><br/>
					<input class='button' type='button' value='Retour' onclick='history.go(-1)'/>
					</form>";
		?>
	</div>
</body>
<?php include("include/foot.php"); ?>