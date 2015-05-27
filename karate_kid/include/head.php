<html>
<?php
	$host = "localhost";
	$dbname = "karate_kid";
	$user = "root";
	$password = "";
	try { $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user, $password); }
	catch (Exception $e){
	        die('Erreur : ' . $e->getMessage());
	}
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<head>
	<meta charset="utf-8"/>
	<title>Karatapanda</title>
	<link rel="stylesheet" href="css/home.css"/>
	<link rel="stylesheet" href="css/form.css"/>
</head>