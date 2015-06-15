<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter un club</h1>
		<form method="POST" action="#">
			<table>
				<tr><td>Nom du club :</td><td><?php echo $_POST['nom']; ?></td></tr>
				<tr><td>Site web :</td><td><?php echo $_POST['siteweb']; ?></td></tr>
				<tr><td>Coordonnées :</td><td><?php echo $_POST['coordonnees']; ?></td></tr>
				<tr><td>Professeur :</td><td>
				<!-- Première solution : création de 5 champs pour 5 premiers professeurs -->
				<?php
					for ($i=0; $i<$_POST['i']; $i++){
						$indice="pr".$i;
						if($_POST[$indice]!=""){echo $_POST[$indice]."<br/>";};
					}
				?>
				</td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
		</form>			
			
		<?php //création de la requête pour la table club
			$debut = "INSERT INTO club (id, nom, site_web, coordonnee_dir) VALUES (";
			$id = "NEXTVAL('club_id_seq')";
			$nom = "'".$_POST['nom']."'";
			$siteweb = "'".$_POST['siteweb']."'";
			$coordonnees = "'".$_POST['coordonnees']."'";
			$fin = ");";
			
			$query = $debut.$id.",".$nom.",".$siteweb.",".$coordonnees.$fin;
			//echo "REQUÊTE CLUB : ".$query."<br/>";
			try{
				//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				pg_query($bdd,$query);
				echo "<br/>Le club ".$nom." a bien été ajouté !";
			}
			catch(PDOException $e){
				echo "<br/>LA REQUÊTE : <".$query."> RENVOIT L'ERREUR :<br/>".$e->getMessage();
			}
			
			//création de la requête pour la table professeur
			$debut = "INSERT INTO professeur (id, id_club, nom) VALUES (";
			$fin = ");";
			$id = "NEXTVAL('professeur_id_seq')";
			$query = "SELECT * FROM club WHERE nom=".$nom.";";
			//echo "SELECT CLUB : ".$query." <br/>";
			$reponse = pg_query($bdd,$query);
			$data = pg_fetch_array($reponse);
			$id_club = $data['id'];
			
			for($i=0; $i<$_POST['i']; $i++){
				$indice="pr".$i;
				if($_POST[$indice]!=""){
					$nom_prof = "'".$_POST[$indice]."'";
					$query = $debut.$id.",".$id_club.",".$nom_prof.$fin;
					//echo "REQUÊTE PROFESSEUR : ".$query." [FIN REQUÊTE]<br/>";
					try{
						//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						pg_query($bdd, $query);
						echo "<br/>Le professeur ".$_POST[$indice]." a bien été ajouté !";
					}
					catch(PDOException $e){
						echo "<br/>LA REQUÊTE : <".$query."> RENVOIT L'ERREUR :<br/>".$e->getMessage();
					}
				}
			}
		?>
	</div>
</body>
<?php include("include/foot.php"); ?>