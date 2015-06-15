<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter une competition</h1>
		<form method="POST" action="#">
			<table>
				<tr><td>Nom du tournoi :</td><td><?php echo $_POST['nom']; ?></td></tr>
				<tr><td>Type :</td><td><?php echo $_POST['type']; ?></td></tr>
				<tr><td>Date : </td><td><?php
					if(isset($_POST['date_jour'])){echo $_POST['date_jour']." / ";} else {echo "erreur date";}
					if(isset($_POST['date_mois'])){echo $_POST['date_mois']." / ";} else {echo "erreur date";}
					if(isset($_POST['date_annee'])){echo $_POST['date_annee'];} else {echo "erreur date";}
				?></td></tr>
				<tr><td>Lieu : </td><td><?php echo $_POST['lieu']; ?></td></tr>
				<tr><td>Club organisateur :</td><td>
					<?php
						$query = "SELECT * FROM club WHERE id=".$_POST['id_club'];
						$reponse = pg_query($bdd,$query);
						$data = pg_fetch_array($reponse);
						$nom_club = $data['nom'];
						echo $nom_club;
					?>
				</td></tr>
				<tr><td>Site web : </td><td><?php echo $_POST['website']; ?></td></tr>
				<tr><td>Contact : </td><td><?php echo $_POST['contact']; ?></td></tr>
				<tr><td>Mouvements interdits : </td><td>
					<?php 
						if (isset($_POST['mains'])) echo $_POST['mains']."<br/>";
						if (isset($_POST['pieds'])) echo $_POST['pieds']."<br/>";
						if (isset($_POST['coudes'])) echo $_POST['coudes']."<br/>";
						if (isset($_POST['genoux'])) echo $_POST['genoux'];
					?></td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
		<?php //création requête pour la table compétition
			$type = $_POST['type'];
			$debut = "INSERT INTO competition_".$type." (nom, dateComp, id_club, lieu, site_web, photos, contact) VALUES (";
			$nom = "'".$_POST['nom']."'";
			$dateComp ="'".$_POST['date_annee']."-".$_POST['date_mois']."-".$_POST['date_jour']."'";
			$id_club =$_POST['id_club'];
			$lieu =  "'".$_POST['lieu']."'";
			$site_web = "'".$_POST['website']."'";
			if(isset($_POST['photos']))
				$photos = "'".$_POST['photos']."'";
			else
				$photos = "NULL";
			$contact = "'".$_POST['contact']."'";
			$fin = ");";
			
			$query = $debut.$nom.",".$dateComp.",".$id_club.",".$lieu.",".$site_web.",".$photos.",".$contact.$fin;
			//echo $query;
			try{
				//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				pg_query($bdd,$query);
				echo "<br/>La compétition ".$nom." a bien été ajoutée !";
			}
			catch(PDOException $e){
	    		echo "<br/>ERREUR REQUETE : ".$query . "<br/>CODE ERREUR : " . $e->getMessage();
	    	}
		?>
	</div>
</body>
<?php include("include/foot.php"); ?>