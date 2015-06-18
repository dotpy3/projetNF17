<?php include("include/head.php");
$host='tuxa.sme.utc';
	$port= '5432';
	$dbname= 'dbnf17p146';
	$user= 'nf17p146';
	$password= 'htJ4IXmZ';
	$GLOBALS['bdd'] = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<?php
			$id_club = $_POST['nom_club'];
			$query = "SELECT * FROM club WHERE id=".$id_club.";";
			$reponse = pg_query($GLOBALS['bdd'],$query);
			$data = pg_fetch_array($reponse);
			echo "<h1>Fiche de ".$data['nom']."</h1>";
			echo "<form> <!-- pour la couleur du background uniquement - pas de method ou d'action -->
					<table>
						<tr><td>Nom :</td><td>".$data['nom']."</td></tr>
						<tr><td>Site web :</td><td>".$data['site_web']."</td></tr>
						<tr><td>Coordonnées du dirigeant :</td><td>".$data["coordonnee_dir"]."</td></tr>
						<tr><td>Professeurs :</td><td>";
					$query = "SELECT * FROM club, professeur WHERE club.id=".$id_club." AND professeur.id_club=".$id_club.";";
					
					$reponse = pg_query($GLOBALS['bdd'],$query);
					while($data = pg_fetch_array($reponse)){
						echo $data['nom']."<br/>";
					}
			echo "</td></tr>
				</table><br/>";
		?>
		<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>
