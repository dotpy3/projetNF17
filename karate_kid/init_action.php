<?php
include("include/head.php");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

/* FONCTIONS */

function traitementCSV($fichier){

}

/* VÉRIFICATIONS DE TRANSFERT ET DE TYPE */

if (!isset($_FILES['file'])) {
	header('Location: init.php?error=noFile');
}

/* VERIFICATION DE LA SELECTION */

$listeModifsPossibles = array('kata','mvts','grades');
if (!isset($_POST['choixInit'])
	|| !in_array($_POST['choixInit'], $listeModifsPossibles)){
	header('Location: init.php?error=noSelection')
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
	// CSV
	$tab = traitementCSV($adresseFichier,$choixTypeModif);
} else {
	// XML
	$tab = traitementXML($contenuFichier,$choixTypeModif);
}