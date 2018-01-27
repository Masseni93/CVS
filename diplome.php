<?php include ('menu_session.php'); 
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO diplomes (ecole_obtention, nom_diplome, annee_obtention, id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['ecole_obtention'])."', '".mysqli_real_escape_string($link,$_POST['nom_diplome'])."', '".$_POST['annee_obtention']."', '".$_SESSION['codeuse']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE diplomes SET ecole_obtention='".mysqli_real_escape_string($link, $_POST['ecole_obtention'])."', nom_diplome='".mysqli_real_escape_string($link,$_POST['nom_diplome'])."', annee_obtention='".$_POST['annee_obtention']."', id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM diplomes WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM diplomes WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CV</title>
</head>
<body style="background-color: lemonchiffon;
">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 dashbord">
				<a href="profil.php">Modifier le profil</a><br>
				<a href="cv.php">Créer CV</a><br>
				<a href="dashbord.php">Afficher votre CV</a><br>
				<a href="experience.php">Ajouter Experience</a><br>
				<a href="diplome.php">Ajouter Diplôme</a><br>
				<a href="interet.php">Ajouter centre d'intérêt</a><br>
			</div>
			<div class="col-sm-6">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
			<span></span>
				<div class="form-group">
					<label for="">Etablissement </label>
						<input name="ecole_obtention" type="text" class="form-control" id="" placeholder="Etablissement d'obtention" value="<?php if (isset ($_GET['id'])) echo $dataU['ecole_obtention']; ?>">
				</div>
				<div class="form-group">
					<label for="">Diplôme</label>
						<input name="nom_diplome" type="text" class="form-control" id="" placeholder="Nom du diplôme" value="<?php if (isset ($_GET['id'])) echo $dataU['nom_diplome']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Année d'obtention</label>
						<input name="annee_obtention" type="text" class="form-control" id="" placeholder="aaaa" value="<?php if (isset ($_GET['id'])) echo $dataU['annee_obtention']; ?>">			
				</div>
				<div>
					<button name="btnValider" type="submit" class=" btn-medium btn-lg">Valider</button>
				</div>
			</form>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class=" col-sm-6 col-sm-offset-2 ">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Etablissement</th>
							<th>Diplome</th>
							<th>Année d'obtention</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT codeuses.id, ecole_obtention, nom_diplome, annee_obtention, diplomes.id FROM diplomes INNER JOIN codeuses ON codeuses.id=diplomes.id_codeuse WHERE codeuses.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['ecole_obtention']; ?></td>
							<td> <?php echo $data['nom_diplome']; ?> </td>
							<td> <?php echo $data['annee_obtention']; ?> </td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
							</td>
							<td><a href="?sup=<?php echo $data['id']; ?>">Supprimer</a></td>
						</tr>
						<?php $n++;
						 } 
							}
						 ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</body>
</html>