<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

	/*

	PARAMETRES REÇUS :

		- EN GET :
			LE TYPE DE MATCH ex : match_katas, match_kumite etc
			$_GET['type_match']
		- EN POST :
			LE NUMERO DE MATCH
			$_POST['num_match']

	*/
	 ?>
<body>
	<?php include("include/menu.php"); ?>
	<h1>Declarer le vainqueur</h1>
	<form method="POST" action="suivi_competition_action3.php">
		<table>
			<tr><td>Compétition :</td><td><?php echo $_POST['competition']; ?></td></tr>
			<?php
				for($i=0; $i<5; $i++){
					echo "<tr><td>
						<select name='karateka_nom".$i."'>
							<option>Liste karatekas</option>
						</select>
						</td><td>";
					$query = "SELECT *
								FROM `competition_`".$comp_type."
								ORDER BY `id`;";
					$reponse = $bdd->query($query);
					
					echo "<select name='nom_karateka'>";
					while($data = $reponse->fetch()){
						echo "<option value='".$data['id']."'>".$data['nom']." (".$data['dateNais'].")"."</option>";
					}
					echo "</select><br/>";
			}
			?>
		</table><br/>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>