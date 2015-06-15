<html>
<?php
	$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p130';
	$user= 'nf17p130';
	$password= 'wpBU2T6z';
	try { $bdd = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password"); }
	catch (Exception $e){
	        die('Erreur : ' . $e->getMessage());
	}
?>
<head>
	<meta charset="utf-8"/>
	<title>Karatapanda</title>
	<link rel="stylesheet" href="css/home.css"/>
	<link rel="stylesheet" href="css/form.css"/>
</head>