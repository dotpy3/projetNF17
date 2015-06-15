<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter un club</h1>
		<form method="POST" action="add_club_action.php">
			<table>
				<tr><td>Nom du club :</td><td><input class="input" type="text" name="nom" required/></td></tr>
				<tr><td>Site web :</td><td><input class="input" type="text" name="siteweb" required/></td></tr>
				<tr><td>Coordonnées du dirigeant : </td><td><input class="input" type="text" name="coordonnees" required/></td></tr>
				<tr><td>Professeurs :</td><td>
					<?php
						for($i=0; $i<5; $i++){
							echo "<input name='pr".$i."' type='text' placeholder='Nom du professeur'/><br/>";
						};
						echo "<input name='i' value='5' HIDDEN>"
					?>
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>