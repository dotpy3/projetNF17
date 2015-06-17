<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

	if(!isset($_POST['id_competition']) ||
	 !isset($_POST['choixClub']) ||
	 !isset($_POST['choixk1']) ||
	 !isset($_POST['scorej1']) ||
	 !isset($_POST['choixk2']) ||
	 !isset($_POST['scorej2'])) header('Location: add_match.php?retour=fail');

	if($_POST['choixk1'] == $_POST['choixk2']) header('Location: add_match.php?retour=samekarateka');

		$competDecoupee=explode("/",$_POST['id_competition']);
		$nomCompet = "'".$competDecoupee[0]."'";
		$dateCompet = "'".$competDecoupee[1]."'";
		$typeCompet = $competDecoupee[2];

		$query = "SELECT * FROM inscription WHERE karateka = ".$_POST['choixk1']." AND competition IN 
(SELECT nom FROM competition_katas UNION SELECT nom FROM competition_kumite UNION SELECT nom FROM competition_mixte UNION SELECT nom FROM competition_tameshi_wari)";
		$reponse = pg_query($GLOBALS['bdd'],$query);

		if(!pg_fetch_array($reponse)) header('Location: add_match.php?retour=notInDB');

		$query = "SELECT * FROM inscription WHERE karateka = ".$_POST['choixk2']." AND competition IN 
(SELECT nom FROM competition_katas UNION SELECT nom FROM competition_kumite UNION SELECT nom FROM competition_mixte UNION SELECT nom FROM competition_tameshi_wari)";
		$reponse = pg_query($GLOBALS['bdd'],$query);

		if(!pg_fetch_array($reponse)) header('Location: add_match.php?retour=notInDB');
		
		$typeMatch = array('competition_katas'=>'match_katas',
				'competition_kumite'=>'match_kumite',
				'competition_mixte'=>'match_mixte',
				'competition_tameshi_wari' => 'match_tameshi_wari'
				);
		var_dump($typeMatch);
		var_dump($typeCompet);
		$query="INSERT INTO ".$typeMatch[$typeCompet]." (nom_competition,datecomp,score_k1,score_k2,karateka1,karateka2) VALUES ("
			.$nomCompet.","
			.$dateCompet.","
			.pg_escape_string($_POST['scorej1']).","
			.pg_escape_string($_POST['scorej2']).","
			.pg_escape_string($_POST['choixk1']).","
			.pg_escape_string($_POST['choixk2']).");";
var_dump($query);
		$reponse =pg_query($GLOBALS['bdd'],$query);
		var_dump($reponse);

		header('Location: add_match.php?retour=ok');
	?>
