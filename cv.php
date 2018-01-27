<?php include ('menu_session.php');
$msg="";
if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO cv (facebook, twitter, github, id_codeuse) VALUES ('".mysqli_real_escape_string($link,$_POST['facebook'])."', '".mysqli_real_escape_string($link,$_POST['twitter'])."', '".mysqli_real_escape_string($link,$_POST['github'])."', '".$_SESSION['codeuse']."' )";
		if (isset($_GET['id'])){
			$sql="UPDATE cv SET facebook='".mysqli_real_escape_string($link, $_POST['facebook'])."', twitter='".mysqli_real_escape_string($link,$_POST['twitter'])."', github='".mysqli_real_escape_string($link,$_POST['github'])."', id_codeuse='".$_SESSION['codeuse']."' WHERE id=".$_GET['id'];
		}
			$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}

	if (isset($_GET['id'])){
	$update="SELECT * FROM cv WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM cv WHERE id=".$_GET['sup'];
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
					<label for="">Facebook</label>
						<input name="facebook" type="text" class="form-control" id="" placeholder="Lien profil Facebook" value="<?php if (isset ($_GET['id'])) echo $dataU['facebook']; ?>">
				</div>
				<div class="form-group">
					<label for="">Twitter</label>
						<input name="twitter" type="text" class="form-control" id="" placeholder="Lien profil Twitter" value="<?php if (isset ($_GET['id'])) echo $dataU['twitter']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Github</label>
						<input name="github" type="text" class="form-control" id="" placeholder="Lien profil Github" value="<?php if (isset ($_GET['id'])) echo $dataU['github']; ?>">			
				</div>
				<div>
					<button name="btnValider" type="submit" class=" btn-medium btn-lg">Valider</button>
				</div>
			</form>
			</div>
		</div>
		<div class="row">
				<div class=" col-md-offset-2 col-md-8 ">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>Github</th>
							<th>Modifier</th>
							<th>Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT codeuses.id, facebook, twitter, github, cv.id FROM cv INNER JOIN codeuses ON codeuses.id=cv.id_codeuse WHERE codeuses.id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){							
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['facebook']; ?></td>
							<td>
							<td><?php echo $data['twitter']; ?></td>
							<td>
							<td><?php echo $data['github']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
							</td>
							<td><a href="?sup=<?php echo $data['id']; ?>">Supprimer</a></td>
						</tr>
						<?php $n++;
						 } }?>
					</tbody>
				</table>

			</div>
			
			</div>
	</div>
</body>
</html>