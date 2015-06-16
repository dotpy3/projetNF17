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
	$reponse = pg_query($GLOBALS['bdd'],$query);
	$echo = "<optgroup label='".$competitionType.">'";
	while($data = pg_fetch_array($reponse,null,PGSQL_ASSOC)){
		$echo.='<option value="'.$data['nom']."'>".$data['nom']."</option>";
	}
	$echo .= "</optgroup>";
	return $echo;
}



<body>
	<?php include("include/menu.php"); ?>
	<h1>Ajouter un match</h1>
	<form method="POST" action="add_match_action.php">
		<?php
			$query = "SELECT * FROM competition_katas, competition_kumite, competition_tameshi_wari, competition_mixte ;";
			$reponse = pg_query($bdd,$query);
			
			echo "<select name='id_competition'>";
			echo addOptionsToSelect("competition_katas");
			echo addOptionsToSelect("competition_kumite");
			echo addOptionsToSelect("competition_tameshi_wari");
			echo addOptionsToSelect("competition_mixte");
			echo "</select><br/>";
		?>		
		<input class="button" type="reset" value="Effacer"/>
		<input class="button" type="submit" value="Valider"/>
	</form>
</body>
<?php include("include/foot.php"); ?>
