<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


function addOptionsToSelect($competitionType){
	$query="SELECT * FROM ".$competitionType;
	$donnees = false;
	$reponse = pg_query($GLOBALS['bdd'],$query);
	$echo="<optgroup label='".$competitionType."'>";
	while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){
		$echo.='<option value="'.$data['nom']."/".$data['datecomp']."/".$competitionType."\">".$data['nom']."</option>";
		$donnees = true;
	}
	$echo.="</optgroup>";
	if ($donnees) return $echo;
}
	?>

<body>
	<?php include("include/menu.php"); ?>
	<h1>Ajouter un coup interdit</h1>
	<form method="POST" action="coupinterdit_action.php"><h2>Compétition :</h2>
		<?php

			if (isset($_GET['retour'])){
				if($_GET['retour'] == 'ok') echo "<h2>Enregistré !</h2>";
				elseif($_GET['retour'] == 'samekarateka') echo "<h2>Impossible : même karateka</h2>";
				elseif($_GET['retour'] == 'notInDB') echo "<h2>Impossible : karateka pas dans la BDD</h2>";
			 else 
				echo "Échec de l'ajout";
			}
			
			echo "<select name=\"id_competition\">";
			echo addOptionsToSelect("competition_kumite");

			?></select>
				
				<h2>Coup interdit :</h2>

				<select name="idCoup">
				<?php
					$query = "SELECT nom_jap,nom_fr FROM mouvements;";
					$reponse = pg_query($GLOBALS['bdd'],$query);
					while($data = pg_fetch_array($reponse)){
						echo "<option value=\"".$data['nom_jap']."\">".$data['nom_jap']." (".$data['nom_fr'].")</option>";
					}
				?>
				</select>
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>
