<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

	/*

	PARAMETRES REÇUS :

		- EN GET :
			LE TYPE DE MATCH ex : match_katas, match_kumite etc
			$_GET['type_match']
		- EN POST :
			LE NUMERO DE MATCH
			$_POST['num_match']

	*/

	function getAssociatedMatch($typeMatch,$numMatch,$dateComp,$nomComp){
		$query = 'SELECT score_k1,score_k2,karateka1,karateka2, k1.nom AS nomk1, k2.nom AS nomk2
			 FROM '.pg_escape_string($typeMatch).' 

			LEFT JOIN karateka k1 ON karateka1 = k1.id
			LEFT JOIN karateka k2 ON karateka2 = k2.id
			 WHERE num_match = '.$numMatch.
		" AND datecomp = '".pg_escape_string($dateComp)."' AND nom_competition ='".$nomComp."'";
		$reponse = pg_query($GLOBALS['bdd'],$query);
		$data = pg_fetch_array($reponse);

		return $data;
	}
	$compet = explode("/",$_POST['num_match']);
	$resultat = getAssociatedMatch($_GET['type_match'],$compet[0],$compet[1],$compet[2]);
	 ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Résultat du match</h1>
	<form method="POST" action="suivi_competition_action3.php">
		<table>
			<tr><td>Compétition : </td><td><?php echo $compet[2]; ?></td></tr>
			
			<?php
				echo "<br />Match : ".$compet[0];
				echo "<br />Karatéka 1 : ".$resultat['nomk1']." Résultat : ".$resultat['score_k1'];
				echo "<br />Karatéka 1 : ".$resultat['nomk2']." Résultat : ".$resultat['score_k2'];
			?>
		</table><br/>
		<!-- BOUTONS TOUJOURS PAREIL
		BOUM BOUM DANS LE HTML
		JS DE DEFONCE MAN
		PAS DE FORMULAIRE, NORMAL, RIEN A DIRE
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/> -->
	</form>
</body>
<?php include("include/foot.php"); ?>
