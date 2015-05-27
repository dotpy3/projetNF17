<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<?php
			$id_karateka = $_POST['nom_karateka'];
			$query = "SELECT * FROM karateka WHERE `id`=".$id_karateka.";";
			$reponse = $bdd->query($query);
			$data = $reponse->fetch();
			
			echo "<h1>Fiche de ".$data['nom']."</h1>";
			echo "<form> <!-- pour la couleur du background uniquement - pas de method ou d'action -->
					<table>
						<tr><td>Nom :</td><td>".$data['nom']."</td></tr>
						<tr><td>Poids</td><td>".$data['poids']." kg</td></tr>
						<tr><td>Taille :</td><td>".$data['taille']." cm</td></tr>
						<tr><td>Date de naissance :</td><td>".$data['dateNais']."</td></tr>
						<tr><td>Ceinture</td><td>".$data['ceinture']."</td></tr>";
						if($data['ceinture']=='noire')
					echo"<tr><td>Dans :</td><td>".$data['dans']."</td></tr>";
					echo"<tr><td>Photo :</td><td><img src='".$data['photo']."' alt='[pas de photo disponible]' /></td></tr>
						<tr><td>Katas maîtrisés :</td><td>";
						//extraction liste des katas maîtrisés
						$query = "SELECT * FROM `maitrise`,`kata` WHERE `id_karateka`=".$id_karateka." AND `maitrise`.`id_kata`=`kata`.`id`;";
						$reponse = $bdd->query($query);
						while($data = $reponse->fetch()){
							echo $data['nom_famille']." -- ".$data['nom_jap']." (".$data['nom_fr'].")</br>";
						}

					echo"</td></tr>
						<tr><td>Historique :</td><td>
							<table class='tab_ii'>
								<tr><th>nom_compet</th><th>classement</th><th>score</th></tr>
								<tr><td>vide</td><td>vide</td><td>vide</td></tr>
							</table>
						</td></tr>
						</table><br/>";
		?>
		<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>