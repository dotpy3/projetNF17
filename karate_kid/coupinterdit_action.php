<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

		$competDecoupee=explode("/",$_POST['id_competition']);
		$nomCompet = "'".$competDecoupee[0]."'";
		$dateCompet = "'".$competDecoupee[1]."'";
		$typeCompet = $competDecoupee[2];

		$query = "INSERT INTO autorise_mouvement (nom_mouvement,nom_competition,datecomp)
		VALUES ('".$_POST['idCoup']."',$nomCompet,$dateCompet);";
		$reponse = pg_query($GLOBALS['bdd'],$query);
		$data = pg_fetch_array($reponse);
		var_dump($reponse);

		header('Location: coupinterdit.php?retour=ok');