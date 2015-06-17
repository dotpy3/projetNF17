<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

	if(!isset($_POST['id_competition']) ||
	 !isset($_POST['choixClub']) ||
	 !isset($_POST['lieu']) ||
	 !isset($_POST['choixk1']) ||
	 !isset($_POST['scorej1']) ||
	 !isset($_POST['choixk2']) ||
	 !isset($_POST['scorej2'])) header('Location: add_match.php?retour=fail');

	if($_POST['choixk1'] == $_POST['choixk2']) header('Location: add_match.php?retour=samekarateka');

		$competDecoupee=explode($_POST['choixClub'],"/");
		$nomCompet = $competDecoupee[count($competDecoupee)-1];
		$dateCompet = $competDecoupee[count($competDecoupee)-2]; $nomCompet ="";
		for($i=0;$i<(count($competDecoupee)-2);$i++){
			$nomCompet.=$competDecoupee($i);
		}
		

		$query="INSERT INTO match (nom,datecomp,id_club,lieu,site_web,photos,contact) VALUES ("
			.pg_escape_string($nomCompet).","
			.pg_escape_string($dateCompet).","
			.pg_escape_string($_POST['choixClub']).","
			.pg_escape_string($_POST['lieu']).","
			.pg_escape_string($_POST['choixk1']).","
			.pg_escape_string($_POST['scorej1']).","
			.pg_escape_string($_POST['choixk2']).","
			.pg_escape_string($_POST['scorej2']).");";
		$reponse =pg_query($GLOBALS['bdd'],$query);

		header('Location: add_match.php?retour=ok');
	?>
