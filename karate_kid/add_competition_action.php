<?php include("include/head.php"); ?>
<body>
	<?php include("include/menu.php"); ?>
	<div id="main">
		<h1>Ajouter une competition</h1>
		<form method="POST" action="#">
			<table>
				<tr><td>Nom du tournoi :</td><td><?php echo $_POST['nom']; ?></td></tr>
				<tr><td>Type :</td><td><?php echo $_POST['type']; ?></td></tr>
				<tr><td>Date : </td><td><?php
					if(isset($_POST['date_jour'])){echo $_POST['date_jour']." / ";} else {echo "erreur date";}
					if(isset($_POST['date_mois'])){echo $_POST['date_mois']." / ";} else {echo "erreur date";}
					if(isset($_POST['date_annee'])){echo $_POST['date_annee'];} else {echo "erreur date";}
				?></td></tr>
				<tr><td>Lieu : </td><td><?php echo $_POST['lieu']; ?></td></tr>
				<tr><td>Site web : </td><td><?php echo $_POST['website']; ?></td></tr>
				<tr><td>Contact : </td><td><?php echo $_POST['contact']; ?></td></tr>
				<tr><td>Mouvements interdits : </td><td>
					<?php 
						if (isset($_POST['mains'])) echo $_POST['mains']."<br/>";
						if (isset($_POST['pieds'])) echo $_POST['pieds']."<br/>";
						if (isset($_POST['coudes'])) echo $_POST['coudes']."<br/>";
						if (isset($_POST['genoux'])) echo $_POST['genoux'];
					?></td></tr>
			</table><br/>
			<input class="button" type="button" value="Retour" onclick="history.go(-1)"/>
			<input class="button" type="submit" value="Valider"/>
		</form>
	</div>
</body>
<?php include("include/foot.php"); ?>