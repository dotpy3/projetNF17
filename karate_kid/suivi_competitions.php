<?php include("include/head.php"); 
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
	?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Suivi des competitions</h1>
		<form method="POST" action="suivi_competitions_action.php">
			<table>
				<tr><td>Choisir la compétition :</td><td>

						<?php

							echo "<select name='nom_competition'>";
								$query = "SELECT nom
											FROM competition_katas
											ORDER BY nom;";
								$reponse = pg_query($GLOBALS['bdd'],$query);
								echo "<optgroup label='katas'>";
								while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){var_dump($data);
								 echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
								echo "</optgroup>";
								
								$query = "SELECT nom
											FROM competition_kumite
											ORDER BY nom;";	
								$reponse = pg_query($GLOBALS['bdd'],$query);
								echo "<optgroup label='kumite'>";
								while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){var_dump($data);
									echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
								echo "</optgroup>";

								$query = "SELECT nom
											FROM competition_tameshi_wari
											ORDER BY nom;";
								$reponse = pg_query($GLOBALS['bdd'],$query);
								echo "<optgroup label='tameshi wari'>";
								while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){var_dump($data);
									echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
								echo "</optgroup>";

								$query = "SELECT nom
											FROM competition_mixte
											ORDER BY nom;";
								$reponse = pg_query($GLOBALS['bdd'],$query);
								echo "<optgroup label='mixte'>";
								while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){var_dump($data);
									echo "<option value='".$data['nom']."'>".$data['nom']."</option>"; }
								echo "</optgroup>";
							echo "</select><br/>";
						?>	
				</td></tr>
			</table><br/>
			<input class="button" type="reset" value="Effacer"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
</body>
<?php include("include/foot.php"); ?>;