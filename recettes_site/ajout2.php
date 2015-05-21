<!DOCTYPE html>

<?php
	if(isset($_POST['type_ajout']))
		$typeAjout=$_POST['type_ajout'];
	else
		$typeAjout="";
	
	$bdd = new PDO('mysql:host=localhost; dbname=bd_recettes; charset=utf8', 'root', '');
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/modele.css" />
<?php
	switch ($typeAjout){
		case "Recette":
			echo "<link rel='stylesheet' href='css/ajout2_recette.css' />";
			break;
		
		case "Menu":
			echo "<link rel='stylesheet' href='css/ajout2_groupe.css' />";
			break;
			
		case "Ingrédient":
			echo "<link rel='stylesheet' href='css/ajout2_ingredient.css' />";
			break;
	}
?>
    <title>Ajout</title>
</head>
<body>
	<?php include('include/menu.php') ?>
	<?php
		switch ($typeAjout){
/* -------------------------------------------------- RECETTE -------------------------------------------------- */
			case 'Recette':
			echo "<h1> Ajouter recette</h1>";
			echo "<form id='form' method='POST' action='ajout3.php' >";
					echo "<div class='list_div'>";
						echo "<p>Nom de la recette :</p><input class='ajout2' name='nom'/><br/>";
						echo "<p>Temps de préparation :</p><input class='ajout2' name='preparation'/><br/>";
						echo "<p>Temps de cuisson :</p><input class='ajout2' name='cuisson'/><br/>";
						echo "<p>Nombre de personnes :</p><input class='ajout2' name='personne'/><br/>";
						echo "<p>Type :</p>
							<select name='type_recette'>
								<option value='aperitif'>Apéritif</option>
								<option value='entree'>Entrée</option>
								<option value='plat'>Plat Principal</option>
								<option value='dessert'>Dessert</option>
							</select>";
					echo "</div><br />";
				echo "<div class='list_div'>
				<h2>Étapes :</h2>";
				echo "<ol>";
					for ($i = 0; $i < 10; $i++){
						echo "<li><input class='' name='etape".$i."' placeholder='Étape ".$i."'/></li>";
					}
				echo "</ol>";
				echo "</div><br/>";
				echo "<div class='list_div ajout2_list_groupe'>
				<h2>Thème :</h2>
				<ul>";
						$reponse = $bdd->query('SELECT * FROM `groupe_recettes`');	
						while ($data = $reponse->fetch()){
							echo "<li><input type='checkbox' name='select_recette[]' value='".$data['nom']."'/>".$data['nom']."</li>";
						};
						$reponse->closeCursor();
				echo "</ul></div><br/>";
			echo "<input class='bouton_submit' type='submit' value='Ajouter' />";
				break;
				
/* -------------------------------------------------- MENU -------------------------------------------------- */
			case 'Menu':
			echo "<h1> Ajouter menu ou thème</h1>";
				echo "<form id='form' method='POST' action='ajout3.php' >";
					echo "<div class='list_div'>";
						echo "<p>Nom du menu / thème :</p><input class='ajout2_menu' name='nom'/>";
						echo "<p>Type :</p>
							<ul>
								<li><input type='radio' name='type_ajout' value='theme' CHECKED />Thème</li>
								<li><input type='radio' name='type_ajout' value='menu' />Menu</li>
							</ul>";
					echo "</div><br />";
					echo "<div class='list_div integ_recette'>";
						echo "<h2>Intégrer recettes :</h2>";
						echo "<ul>";
							$reponse = $bdd->query('SELECT * FROM `recette`');	
							while ($data = $reponse->fetch()){
								echo "<li><input type='checkbox' name='select_recette[]' value='".$data['nom']."'/> ".$data['nom']."</li>";
							};
							$reponse->closeCursor();
						echo "</ul>";
					echo "</div><br />";
				echo "<input class='bouton_submit' type='submit' value='Ajouter' />";
				break;
				
/* -------------------------------------------------- INGRÉDIENT -------------------------------------------------- */
			case 'Ingrédient':
			echo "<h1> Ajouter ingrédient</h1>";
				echo "<form id='form' method='POST' action='ajout3.php' >";
					echo "<div class='list_div'>";
						echo "Nom de l'ingrédient :<br/><input class='ajout2' name='nom'/><br/>";
					echo "</div><br />";
				echo "<input class='bouton_submit' type='submit' value='Ajouter' />";
				break;
				
			default:
			echo "<h1><i>Erreur</i></h1>";
				echo "<div class='list_div'>";
					echo "Erreur de sélection.";
				echo "</div><br />";
				break;
		}
	?>
	<input type="button" class="bouton_submit" id="bouton_retour" value="Retour" onclick="history.go(-1)">
	<?php echo"<input name='type_ajout' value='".$typeAjout."' HIDDEN />"; ?>
	</form>
</body>
</html>