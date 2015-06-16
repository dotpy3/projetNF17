<!DOCTYPE html>
<html>
<head>
	<title>Initialiser la BDD</title>
	<meta charset="utf-8" />
</head>
<?php include("include/head.php");
if (isset($_GET['error']) && $_GET['error'] = 'noFile') $error = "<h2>Erreur : Aucun fichier envoyé</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'xmlMvtReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'cxvMvtReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'xmlKataReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'csvKataReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'xmlGrdReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['message']) && $_GET['message'] = 'xmlGrdReceived') $error = "<h2>Fichier reçu !</h2>";
elseif (isset($_GET['error']) && $_GET['error'] = 'dataBaseError') $error = "<h2>Erreur de connexion à la BDD</h2>";
elseif (isset($_GET['error']) && $_GET['error'] = 'emptyFile') $error = "<h2>Erreur : Fichier vide</h2>";
elseif (isset($_GET['error']) && $_GET['error'] = 'noSelection') $error = "<h2>Erreur : Aucune sélection de type de fichier</h2>";
elseif (isset($_GET['error']) && $_GET['error'] = 'invalidType') $error = "<h2>Erreur : Fichier de type incorrect</h2>";
else $error = "";
?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Initialiser la base de donnees avec un fichier CSV ou XML</h1>
	<?php echo $error; ?>
	<form method="POST" action="init_action.php" enctype="multipart/form-data">
		<table>
			<select name="choixInit">
				<option value="kata">Initialiser les katas</option>
				<option value="mvts">Initialiser les mouvements</option>
				<option value="grades">Initialiser les grades</option>
			</select>
			<tr><td>Fichier CSV ou XML :</td><td> <input type="file" name="file" id="file"/></td></tr>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
</html>