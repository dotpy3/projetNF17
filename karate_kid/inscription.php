<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Inscription</h1>
		<form method="POST" action="add_karateka_action.php">
			<table>
				<tr><td>Nom karateka :</td><td>
					<select>
						<?php echo "<option>extraire liste des karatekas</option>";?>
					</select>	
				</td></tr>
				<tr><td>Nom de la compétition :</td><td>
					<select>
						<?php echo "<option>extraire liste des compétitions qui ne sont pas encore complètes</option>";?>
					</select>
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>