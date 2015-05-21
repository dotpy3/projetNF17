<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Karatekas</h1>
	<form method="POST" action="view_karatekas_action.php">
		<select name="nom_karateka">
			<option>Liste extraite des karatekas existants</option>
		</select><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>