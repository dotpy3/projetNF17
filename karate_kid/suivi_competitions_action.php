<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Declarer le vainqueur</h1>
	<form method="POST" action="suivi_competition_action.php">
		<table>
			<tr><td>Compétition :</td><td><?php echo $_POST['competition']; ?></td></tr>
			<tr><td>Mouvements effectués :</td><td>
				<?php
					for ($i=1; $i<$_POST['i']; $i++){
						$indice="move".$i;
						if($_POST[$indice]!="0"){echo "Mouvement".$i." : ".$_POST[$indice]."<br/>";};
					}
				?></td></tr>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>