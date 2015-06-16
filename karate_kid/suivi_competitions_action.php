<?php include("include/head.php"); 
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

	function generateSelectQuery($typeComp,$nameComp){
		$query="SELECT num_match, nom_competition, k1.nom AS idK1, k2.nom AS idK2
			FROM ".$typeComp." 
			LEFT JOIN karateka k1 ON karateka1 = k1.id
			LEFT JOIN karateka k2 ON karateka2 = k2.id
			WHERE nom_competition = '".$nameComp."'
			ORDER BY nom_competition;";

		return $query;
	}

	function printListMatch($query){

		// AFFICHE LA LISTE DES MATCHS
		// RETOURNE LE NOMBRE DE MATCHS TROUVÉS

		$reponse = pg_query($GLOBALS['bdd'], $query);
		if( !($data = pg_fetch_array($reponse,null,PGSQL_ASSOC))){
			return 0;
		} else {
			echo "<p>Sélection de match : </p><select name=\"nom_match\">"; $i = 1;
			do {
				echo "<option value='".$data['num_match']."_".$data['nom_competition']."'>".$data['idk1']." VS ".$data['idk2']."</option>";
				$i+=1;
			} while ($data = pg_fetch_array($reponse,null,PGSQL_ASSOC));
			echo "</select>";
			return $i;
		}
	}
	?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Choisir match</h1>
	<form method="POST" action="suivi_competitions_action2.php">
		<table>
			<tr><td>Compétition :</td><td><?php $nom_comp = $_POST['nom_competition']; echo $nom_comp; ?></td></tr>
			<?php
				if (!isset($_POST['nom_competition'])) header('Location: suivi_competitions.php');
					$nbMatchsACeNom=0;
					$query=generateSelectQuery("match_katas",$nom_comp);
					$nbMatchsACeNom+=printListMatch($query);

					$query = generateSelectQuery("match_kumite",$nom_comp);
					$nbMatchsACeNom+=printListMatch($query);

					$query=generateSelectQuery("match_mixte",$nom_comp);
					$nbMatchsACeNom+=printListMatch($query);

					$query = generateSelectQuery("match_tameshi_wari",$nom_comp);
					$nbMatchsACeNom+=printListMatch($query);

					if ($nbMatchsACeNom == 0) echo "<p>Pas de matchs</p>";
//				while($data = $reponse->fetch()){ echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
			?>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>