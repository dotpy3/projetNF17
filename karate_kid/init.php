<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Initialiser la base de donnees</h1>
	<form method="POST" action="init_action.php">
		<table>
			<tr><td>Fichier CSV ou XML :</td><td> <input type="file" name="file"/></td></tr>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<html>