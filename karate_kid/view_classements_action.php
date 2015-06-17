<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Compétition</h1>
	<form>
		<table>
		<?php
			$nomCmpt = $_POST['nom_competition'];
			//Trouvez le type de compétition
			$query = "SELECT * FROM competition_katas
				WHERE nom ='".$_POST['nom_competition']."'";
			$reponse = pg_query($bdd,$query);
			if($data = pg_fetch_array($reponse)) $typeCmpt = "katas";

				else{
				$query = "SELECT * FROM competition_kumite
					WHERE nom ='".$_POST['nom_competition']."'";
				$reponse = pg_query($bdd,$query);
				if($data = pg_fetch_array($reponse)) $typeCmpt = "kumite";
			
				else{
					$query = "SELECT * FROM competition_mixte
						WHERE nom ='".$_POST['nom_competition']."'";
					$reponse = pg_query($bdd,$query);
					if($data = pg_fetch_array($reponse)) $typeCmpt = "mixte";

						else{
						$query = "SELECT * FROM competition_tameshi_wari
							WHERE nom ='".$_POST['nom_competition']."'";
						$reponse = pg_query($bdd,$query);
						if($data = pg_fetch_array($reponse)) $typeCmpt = "tameshi_wari";

							else{
							$typeCmpt = "erreur";
							}
						}
					}
				}

			//Vérification que la compétition a bien été trouvée
			if($typeCmpt == "erreur") echo "Erreur : compétition non trouvée dans la base.</br>";
			//si la compétition a été trouvée, on affiche ses informations
			else {
				//information de base
				echo "<tr><td>Nom :</td><td>".$data['nom']."</td></tr>".
				"<tr><td>Date :</td><td>".$data['datecomp']."</td></tr>".
				"<tr><td>Lieu :</td><td>".$data['lieu']."</td></tr>".
				"<tr><td>Site web :</td><td>".$data['site_web']."</td></tr>".
				"<tr><td>Photos :</td><td>Pas de photos disponibles</td></tr>".
				"<tr><td>Contact :</td><td>".$data['contact']."</td></tr>".
				"<tr><td>Club organisateur :</td><td>";
				$idcluborga = $data['id_club'];
				$query = "SELECT * FROM club WHERE id='".$idcluborga."';";
				if(!($reponse = pg_query($bdd, $query))) echo "Erreur : pas de club trouvé.";
				else echo $data['nom'];
				echo "</td></tr>".
				"<tr><td>Matches existants :</td><td>";

				//matches de la compétition
				$query = "SELECT * FROM match_".$typeCmpt." WHERE nom_competition='".$nomCmpt."' ORDER BY num_match;";
				$reponse = pg_query($bdd, $query);
				while($data = pg_fetch_array($reponse)){
					$queryk1 = "SELECT * FROM karateka WHERE id=".$data['karateka1'];
					$datak1 = pg_fetch_array(pg_query($bdd, $queryk1));
					$queryk2 = "SELECT * FROM karateka WHERE id=".$data['karateka2'];
					$datak2 = pg_fetch_array(pg_query($bdd, $queryk2));
					echo "match n°".$data['num_match']." : ".$datak1['nom']." ".$data['score_k1']." - ".$data['score_k2']." ".$datak2['nom'];
				}
				echo "</td></tr>";
			}
		?>
		</table>
	</form>
</body>
<?php include("include/foot.php"); ?>
