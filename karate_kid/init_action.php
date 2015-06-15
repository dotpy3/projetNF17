<?php
ini_set('display_errors',1);
include("include/head.php");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

/* FONCTIONS */

function checkNotEmpty($tab){
	if(count($tab) == 0) header('Location: init.php?error=emptyFile');
}

function traitementXMLGrades($contenuNonParse){
	$contenu = new SimpleXMLElement($contenuNonParse);
	checkNotEmpty($contenu->grade);
	foreach($contenu->grade as $gradeDispo){
		//$vSql = "ALTER TYPE grades "
	}
}

function traitementCSVKata($fichier){

}

function traitementCSVMouvements($fichier){

}

function traitementCSVGrades($fichier){

}

function traitementXMLKata($contenuParse){

}

function traitementXMLMouvements($contenuParse){

}

function traitementCSV($fichier,$choixModif){
	echo("TRAITEMENTCSV :" . $choixModif );/*
	return;
	switch ($choixModif){
		case 'kata':
			traitementCSVKata($fichier);
			break;
		case 'mvts':
			traitementCSVMouvements($fichier);
			break;
		case 'grades':
			traitementCSVGrades($fichier);
			break;
	}*/

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
			echo("test3");
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
	//traitementCSV($adresseFichier,$choixTypeModif);
} elseif ($type == "text/xml") {
	echo("xml<br />");
	// XML
	try{traitementXML($contenuFichier,$choixTypeModif);} catch(\Exception $e) {var_dump($e);}
} else { // $type == "text/xml"
//
}

echo("test" . $type . " " . $choixTypeModif);