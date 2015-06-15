<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Classements</h1>
	<form method="POST" action="view_classements_action.php">
		<select name="nom_competition">
			<option>Liste extraite des noms de compétition existants</option>
		</select><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>