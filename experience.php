<?php include ('menu_session.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO experiences (poste, date_debut, date_fin, entreprise, description,id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['poste'])."', '".$_POST['date_debut']."', '".$_POST['date_fin']."', '".mysqli_real_escape_string($link,$_POST['entreprise'])."', '".mysqli_real_escape_string($link,$_POST['description'])."', '".$_SESSION['codeuse']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE experiences SET poste='".mysqli_real_escape_string($link, $_POST['poste'])."', date_debut='".$_POST['date_debut']."', date_fin='".$_POST['date_fin']."', entreprise='".mysqli_real_escape_string($link,$_POST['entreprise'])."', description='".mysqli_real_escape_string($link,$_POST['description'])."', id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM experiences WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM experiences WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Expériences</title>
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
					<label for="">Organisation</label>
						<input name="entreprise" type="text" class="form-control" id="" placeholder="Organistaion ou Entreprise" value="<?php if (isset ($_GET['id'])) echo $dataU['entreprise']; ?>">
				</div>
				<div class="form-group">
					<label for="">Poste Occupée</label>
						<input name="poste" type="text" class="form-control" id="" placeholder="Poste Occupée" value="<?php if (isset ($_GET['id'])) echo $dataU['poste']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Description</label>
						<textarea name="description" type="text" class="form-control" id="" placeholder="Description du poste"></textarea>
				</div>
				<div class="form-group">
					<label for="">Date debut</label>
						<input name="date_debut" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset ($_GET['id'])) echo $dataU['date_debut']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Date fin</label>
						<input name="date_fin" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset ($_GET['id'])) echo $dataU['date_fin']; ?>">			
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
							<th>Organisation</th>
							<th>Poste</th>
							<th>Description</th>
							<th>Date début</th>
							<th>Date fin</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT codeuses.id, entreprise, poste, experiences.description, date_debut, date_fin, experiences.id FROM experiences INNER JOIN codeuses ON codeuses.id=experiences.id_codeuse WHERE codeuses.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['entreprise']; ?></td>
							<td> <?php echo $data['poste']; ?> </td>
							<td> <?php echo $data['description']; ?> </td>
							<td> <?php echo $data['date_debut']; ?> </td>
							<td> <?php echo $data['date_fin']; ?> </td>
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