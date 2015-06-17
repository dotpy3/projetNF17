<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Inscription</h1>
		<form>
			<?php
				//élaboration de la requête SQL
				//1.récupération des informations de la compétition
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
				if($typeCmpt != "erreur"){
					//Vérification que le karateka choisi n'est pas déjà inscrit à la compétition demandée
					$competition = $data;
					$query = "SELECT * FROM inscription
							  WHERE type= '".$typeCmpt."'
							  AND karateka=".$_POST['id_karateka'].";";
					if(!$reponse = pg_query($bdd, $query)){
						echo "Ce karateka participe déjà à la compétition choisie !<br/>";
					}
					else {
						//2. élaboration de la requête proprement dite
						$debut = "INSERT INTO inscription VALUES (";
						$id_karateka = $_POST['id_karateka'];
						$typeCmpt = "'".$typeCmpt."'";
						$nomCmpt = "'".$_POST['nom_competition']."'";
						$fin = ");";
						
						$query = $debut.$id_karateka.",".$typeCmpt.",".$nomCmpt.$fin;

						//Test du succès de la requête d'insertion
						if(!($reponse = pg_query($bdd, $query)))
						{
							echo "/!\ L'ajout du karateka a la compétition n'a pas été réalisé. L'erreur suivante a été rencontrée : <br/>";
							echo pg_last_error();
							exit(); //si erreur d'insertion affichage de l'erreur et interruption du script
						}

						//3. Message de confirmation a destination de l'utilisateur
						$query = "SELECT * FROM karateka k WHERE k.id=".$_POST['id_karateka'].";";
						$reponse = pg_query($bdd, $query);
						$data = pg_fetch_array($reponse);

						echo "Le karateka ".$data['nom']." a bien été ajouté à la compétition ".$_POST['nom_competition'];
					}
				}
				else{
					echo "erreur dans la récupération des informations de la table demandée";
				}
			?>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>