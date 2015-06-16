<?php
ini_set('display_errors',1);
include("include/head.php");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	try { $GLOBALS['bdd'] = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password); } catch (Exception $e) { 
		header('Location: init.php?error=dataBaseError');
	}

/* FONCTIONS */

function checkNotEmpty($tab){
	if(count($tab) == 0) header('Location: init.php?error=emptyFile');
}

function traitementCSVKata($fichier){
	$file_handle = fopen($fichier, "r");
	while(!feof($file_handle)){
		$line_of_text = fgetcsv($file_handle,1024);
		$famille = pg_escape_string($line_of_text[0]);
		$nomJap = pg_escape_string($line_of_text[1]);
		$nomFr = pg_escape_string($line_of_text[2]);
		$desc = pg_escape_string($line_of_text[3]);
		$video = pg_escape_string($line_of_text[4]);
		$schema = pg_escape_string($line_of_text[5]);
		$ceintureChoisie = pg_escape_string($line_of_text[6]);
		$dan = pg_escape_string($line_of_text[7]);
		$vSql = "INSERT INTO kata (nom_famille,nom_jap,nom_fr,description,videos,schema,ceinture,dans)
		VALUES ('$famille','$nomJap','$nomFr','$desc','$video','$schema','$ceintureChoisie',$dan);";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
		var_dump($vQuery);
		return;
	}
	header('Location: init.php?message=csvKataReceived');
}

function traitementCSVGrades($fichier){
	$file_handle = fopen($fichier, "r");
	while(!feof($file_handle)){
		$line_of_text = fgetcsv($file_handle,1024);
		$nomKar = pg_escape_string($line_of_text[0]);
		$ceinture = pg_escape_string($line_of_text[2]);
		if ($ceinture == 'noire') $dan = $line_of_text[1];
		else $dan = 0;
		$vSql = "UPDATE karateka SET ceinture = '".$ceinture."', dans = '".$dan ."' WHERE nom = '".$nomKar."'";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
		var_dump($vQuery);
		return;
	}
	header('Location: init.php?message=csvKataReceived');
}

function traitementCSVMouvements($fichier){
	$file_handle = fopen($fichier, "r");
	while(!feof($file_handle)){
		$line_of_text = fgetcsv($file_handle,1024);
		$nomJap = pg_escape_string($line_of_text[0]);
		$nomFr = pg_escape_string($line_of_text[1]);
		$schema = pg_escape_string($line_of_text[2]);
		$categ = pg_escape_string($line_of_text[3]);
		$sousCateg = pg_escape_string($line_of_text[4]);
		$vSql = "INSERT INTO mouvements (nom_jap,nom_fr,schema,categorie,sous_categorie)
		VALUES ('$nomJap','$nomFr','$schema','$categ','$sousCateg');";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
		var_dump($vQuery);
		return;
	}
	header('Location: init.php?message=csvMvtReceived');
}

function traitementXMLKata($contenuNonParse){
	$contenu = new SimpleXMLElement($contenuNonParse);
	checkNotEmpty($contenu->Kata);
	foreach($contenu->Kata as $kataEtudie){
		$famille = pg_escape_string($kataEtudie->Famille);
		$nomJap = pg_escape_string($kataEtudie->NomJap);
		$nomFr = pg_escape_string($kataEtudie->nomFrancais);
		$desc = pg_escape_string($kataEtudie->Description);
		$video = pg_escape_string($kataEtudie->Video);
		$schema = pg_escape_string($kataEtudie->schema);
		$ceintureChoisie = pg_escape_string($kataEtudie->ceinture);
		$dan = pg_escape_string($kataEtudie->dans);
		$vSql = "INSERT INTO kata (nom_famille,nom_jap,nom_fr,description,videos,schema,ceinture,dans)
		VALUES ('$famille','$nomJap','$nomFr','$desc','$video','$schema','$ceintureChoisie',$dan);";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
	}
		header('Location: init.php?message=xmlKataReceived');
}

function traitementXMLMouvements($contenuNonParse){
	$contenu = new SimpleXMLElement($contenuNonParse);
	checkNotEmpty($contenu->Mouvement);
	foreach($contenu->Mouvement as $mvtEtudie){
		$nomJap = pg_escape_string($mvtEtudie->nomJap);
		$nomFr = pg_escape_string($mvtEtudie->nomFr);
		$schema = pg_escape_string($mvtEtudie->schema);
		$categ = pg_escape_string($mvtEtudie->categorie);
		$sousCateg = pg_escape_string($mvtEtudie->sousCategorie);
		$vSql = "INSERT INTO mouvements (nom_jap,nom_fr,schema,categorie,sous_categorie)
		VALUES ('$nomJap','$nomFr','$schema','$categ','$sousCateg');";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
	}
		header('Location: init.php?message=xmlMvtReceived');

}

function traitementXMLGrades($contenuNonParse) {
	$contenu = new SimpleXMLElement($contenuNonParse);
	checkNotEmpty($contenu->insertionGrade);
	foreach($contenu->insertionGrade as $gradeEtudie){
		$nomKar = pg_escape_string($gradeEtudie->nomKarateka);
		$ceinture = pg_escape_string($gradeEtudie->ceinture);
		if ($ceinture == 'noire') $dan = $gradeEtudie->dans;
		else $dan = 0;
		$vSql = "UPDATE karateka SET ceinture = '".$ceinture."', dans = '".$dan ."' WHERE nom = '".$nomKar."'";
		$vQuery = pg_query($GLOBALS['bdd'],$vSql);
	}
		header('Location: init.php?message=xmlGrdReceived');
}

function traitementCSV($fichier,$choixModif){
	echo("TRAITEMENTCSV :" . $choixModif );
	switch ($choixModif){
		case 'kata':
			traitementCSVKata($fichier);
			break;
		case 'mvts':
			traitementCSVMouvements($fichier);
			break;
		case 'grades':
			traitementCSVGrades($fichier);
	}

}

function traitementXML($contenu,$choixModif){
	switch ($choixModif){
		case 'kata':
			echo("test1");
			traitementXMLKata($contenu);
			break;
		case 'mvts':
			echo("test2");
			traitementXMLMouvements($contenu);
			break;
		case 'grades':
			traitementXMLGrades($contenu);
			break;
	}
}

/* VÉRIFICATIONS DE TRANSFERT ET DE TYPE */

if (!isset($_FILES['file'])) {
	header('Location: init.php?error=noFile');
}

/* VERIFICATION DE LA SELECTION */

$listeModifsPossibles = array('kata','mvts','grades');
if (!isset($_POST['choixInit'])
	|| !in_array($_POST['choixInit'], $listeModifsPossibles)){
	header('Location: init.php?error=noSelection');
}
$choixTypeModif = $_POST['choixInit'];

/* VERIFICATION DU TYPE */

$fichier = $_FILES['file'];
$type = $fichier["type"];
if ($type != "text/csv" && $type != "text/xml") {
	header('Location: init.php?error=invalidType');
}
$adresseFichier = $fichier['tmp_name'];
$contenuFichier = file_get_contents($adresseFichier);

/* DÉBUT DU TRAITEMENT DES DONNÉES */

if ($type == "text/csv"){
	echo("csv<br />");
	// CSV
	traitementCSV($adresseFichier,$choixTypeModif);
} elseif ($type == "text/xml") {
	echo("xml<br />");
	// XML
	traitementXML($contenuFichier,$choixTypeModif);
} else { // $type == "text/xml"
//
}

echo("test" . $type . " " . $choixTypeModif);