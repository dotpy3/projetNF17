<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Suivi des competitions</h1>
		<form method="POST" action="suivi_competitions_action.php">
			<table>
				<tr><td>Choisir la compétition :</td><td>
					<select name="competition">
						<?php echo "<option>extraire liste des compétitions non terminées / en cours d'exe (date)</option>";?>
					</select>
				</td></tr>
				<tr><td colspan="2">
					<?php
						for($i=1; $i<=5; $i++){
							$indice=$i+1;
							echo "Mouvement ".$i." : <select name='move".$i."'>
								<option value='0'></option>
								<option>Liste extraite des mouvements autorisés</option>
							</select><br/>";
						};
						echo "<input name='i' value='5' HIDDEN>"
					?>
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
</body>
<?php include("include/foot.php"); ?>