<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
	?>
<?php 
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

function getListKaratekas(){
	$query = "SELECT * FROM karateka";
	$reponse = pg_query($GLOBALS['bdd'],$query);
	while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){
		$listeKaratekas[] = $data;
	}
	return $listeKaratekas;
}

function getListClub(){
	$query = "SELECT * FROM club";
	$reponse = pg_query($GLOBALS['bdd'],$query);
	while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){
		$listeClubs[] = $data;
	}
	return $listeClubs;
}

?>

<body>
	<?php include("include/menu.php"); ?>
	<h1>Ajouter un match</h1>
	<form method="POST" action="add_match_action.php">
		<?php
			$query = "SELECT * FROM competition_katas, competition_kumite, competition_tameshi_wari, competition_mixte ;";
			$reponse = pg_query($bdd,$query);

			if (isset($_GET['retour'])){
				if($_GET['retour'] == 'ok') echo "<h2>Enregistré !</h2>";
				elseif($_GET['retour'] == 'samekarateka') echo "<h2>Impossible : même karateka</h2>";
				elseif($_GET['retour'] == 'notInDB') echo "<h2>Impossible : karateka pas dans la BDD</h2>";
			 else 
				echo "Échec de l'ajout";
			}
			
			echo "<select name=\"id_competition\">";
			echo addOptionsToSelect("competition_katas");
			echo addOptionsToSelect("competition_kumite");
			echo addOptionsToSelect("competition_tameshi_wari");
			echo addOptionsToSelect("competition_mixte");

			?></select>
				<p>Karatéka 1 :
				<select name="choixk1">
				<?php foreach(getListKaratekas() as $karatekaChoisi){
					echo "<option value=\"".$karatekaChoisi['id']."\">".$karatekaChoisi['nom']."</option>";
				} ?>
				</select>
				Score : <input type="text" name="scorej1">
				</p>
				<p>Karatéka 2 :
				<select name="choixk2">
				<?php foreach(getListKaratekas() as $karatekaChoisi){
					echo "<option value=\"".$karatekaChoisi['id']."\">".$karatekaChoisi['nom']."</option>";
				} ?>
				</select>
				Score : <input type="text" name="scorej2">
				</p>
				<p>Type match (pour les mixtes) :
				<select name="typeMatch">
					<option value="katas">Katas</option>
					<option value="kumite">Kumite</option>
					<option value="tameshi_wari">Tameshi Wari</option>
				</select>
				</p>

			<?php
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>
