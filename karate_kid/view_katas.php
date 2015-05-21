<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Katas</h1>
	<form method="POST" action="view_katas_action.php">
		<select name="nom_kata">
			<option>Liste extraite des katas existants</option>
		</select><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>