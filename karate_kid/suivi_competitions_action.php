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

	function getListMatch($query){

		// AFFICHE LA LISTE DES MATCHS
		// RETOURNE LE NOMBRE DE MATCHS TROUVÉS

		$reponse = pg_query($GLOBALS['bdd'], $query);
		if( !($data = pg_fetch_array($reponse,null,PGSQL_ASSOC))){
			return array();
		} else {
			do {
				$echo[] = array('num_match' => $data['num_match'], 'nomMatch' => $data['idk1']." VS ".$data['idk2']);
			} while ($data = pg_fetch_array($reponse,null,PGSQL_ASSOC));
			return $echo;
		}
	}

	function printListMatch($query){
		$tabMatchs = getListMatch($query);
		if (count($tabMatchs) == 0) return;
		echo "<p>Sélection de match : </p><select name=\"num_match\">";
		foreach($tabMatchs as $match){
			echo "<option value='".$match['num_match']."'>".$match['nomMatch']."</option>";
		}
		echo "</select>";
		return;
	}

	if (!isset($_POST['nom_competition'])) header('Location: suivi_competitions.php');
	 				$nom_comp = $_POST['nom_competition'];
					$nbMatchsACeNom=0;

					$query1=generateSelectQuery("match_katas",$nom_comp);
					$redirection = "";
					if (count(getListMatch($query1)) > 0) $redirection="match_katas";

					$query2 = generateSelectQuery("match_kumite",$nom_comp);
					$nbMatchsACeNom+=count(getListMatch($query2));
					if (count(getListMatch($query2)) > 0) $redirection="match_kumite";

					$query3=generateSelectQuery("match_mixte",$nom_comp);
					$nbMatchsACeNom+=count(getListMatch($query3));
					if (count(getListMatch($query3)) > 0) $redirection="match_mixte";

					$query4 = generateSelectQuery("match_tameshi_wari",$nom_comp);
					$nbMatchsACeNom+=count(getListMatch($query4));
					if (count(getListMatch($query4)) > 0) $redirection="match_tameshi_wari";
	?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Choisir match</h1>
	<form method="POST" action="suivi_competitions_action2.php?type_match=<?php echo $redirection; ?>">
		<table>
			<tr><td>Compétition :</td><td><?php echo $nom_comp; ?></td></tr>
			<?php
				
					printListMatch($query1);
					printListMatch($query2);
					printListMatch($query3);
					printListMatch($query4);

					if ($nbMatchsACeNom == 0) echo "<p>Pas de matchs</p>";
//				while($data = $reponse->fetch()){ echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
			?>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>