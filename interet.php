<?php include ('menu_session.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO interets (titre, description, id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['titre'])."', '".mysqli_real_escape_string($link,$_POST['description'])."', '".$_SESSION['codeuse']."')";
		if (isset($_GET['id'])){
			$sql="UPDATE interets SET titre='".mysqli_real_escape_string($link, $_POST['titre'])."', description='".mysqli_real_escape_string($link,$_POST['description'])."', id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id']; 
 		}
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM interets WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM interets WHERE id=".$_GET['sup'];
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
					<label for=""> Centre d'intérêt</label>
						<select name="titre" class="form-control" value="<?php echo $dataU['titre']; ?>">
							<option>Sport</option>			
							<option>Littérature</option>			
							<option>Musique</option>			
							<option>Sciences</option>
						</select>			
				</div>
				<div class="form-group">
					<label for="">Description</label>
						<textarea name="description" type="text" class="form-control" id="" placeholder="Description du centre d'intérêt"></textarea>
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
							<th>Centre d'intérêt</th>
							<th>Description</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT codeuses.id, titre, interets.description, interets.id FROM interets INNER JOIN codeuses ON codeuses.id=interets.id_codeuse WHERE codeuses.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td> <?php echo $data['description']; ?> </td>
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