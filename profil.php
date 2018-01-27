<?php include ('menu_session.php');
if (isset($_POST['modifier'])){
		$sql= "UPDATE codeuses SET nom='".mysqli_real_escape_string($link, $_POST['nom'])."', prenoms='".mysqli_real_escape_string($link, $_POST['prenoms'])."', date_naissance='". $_POST['date_naissance']."', description='".mysqli_real_escape_string($link, $_POST['description'])."', email='".mysqli_real_escape_string($link, $_POST['email'])."', specialisation='".mysqli_real_escape_string($link, $_POST['specialisation'])."', telephone='". $_POST['telephone']."', mdp='".mysqli_real_escape_string($link,md5($_POST['mdp']))."', photo='".$_FILES['photo']['name']."' WHERE id=".$_SESSION['codeuse'];
	}
if (isset($_GET['id'])){
	$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
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
			<legend>Formulaire D'inscription </legend>
			<span></span>
				<div class="form-group">
					<label for="">Nom</label>
						<input name="nom" type="text" class="form-control" id="" placeholder="Nom" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>">
				</div>
				<div class="form-group">
					<label for="">Prenoms</label>
						<input name="prenoms" type="text" class="form-control" id="" placeholder="Prenoms" value="<?php if (isset ($_GET['id'])) echo $dataU['prenoms']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Date de naissance</label>
						<input name="date_naissance" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset ($_GET['id'])) echo $dataU['date_naissance']; ?>">
				</div>
				<div class="form-group">
					<label for="">Resume</label>
						<textarea name="description" type="text" class="form-control textarea" id="" placeholder="Décrivez-vous"></textarea>
				</div>
				<div class="form-group">
					<label for="">Email</label>
						<input name="email" type="email" class="form-control" id="" placeholder="Email" value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>">			
				</div>
				<div class="form-group">
					<label for="">Téléphone</label>
						<input name="telephone" type="number" class="form-control" id="" placeholder="Numéro de téléphone" value="<?php if (isset ($_GET['id'])) echo $dataU['telephone']; ?>">	
				</div>
				<div class="form-group">
					<label for="">Spécialisation</label>
						<input name="specialisation" type="text" class="form-control" id="" placeholder="Votre spécialisation" value="<?php if (isset ($_GET['id'])) echo $dataU['specialisation']; ?>">	
				</div>
				<div class="form-group">
					<label for="">Mot de passe</label>
						<input name="mdp" type="password" class="form-control" id="" placeholder="Mot de passe" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp']; ?>">	
				</div>
				<div class="form-group">
							<label for="">Photo du CV</label>
							<input name="photo" type="file" class="form-control" id="" placeholder=" Choisissez une photo" value="<?php if (isset ($_GET['id'])) echo $dataU['image']['name']; ?>">
						</div>
				<div>
					<button name="modifier" type="submit" class=" btn-medium btn-lg">Modifier</button>
				</div>
		</form>
			</div>
		</div>
		<div class="row">
				<div class="col-sm-2"></div>
				<div class=" col-sm-6">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Nom</th>
							<th>Prénoms</th>
							<th>Date de naissance</th>
							<th>Photo</th>
							<th>Spécialisation</th>
							<th>email</th>
							<th>Téléphone</th>
							<th>Description</th>
							<th>Modifier</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							if (isset($_SESSION['codeuse'])) {
								# code...
								$list=" SELECT * FROM codeuses WHERE id=".$_SESSION['codeuse'];
							$res= mysqli_query($link,$list);
						while ($data = mysqli_fetch_array($res)){								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['nom']; ?></td>
							<td> <?php echo $data['prenoms']; ?> </td>
							<td> <?php echo $data['date_naissance']; ?> </td>
							<td> <img src="upload/<?php echo $data['photo'];  ?>" width="30px" height="30px" alt=""></td>
							<td> <?php echo $data['specialisation']; ?> </td>
							<td> <?php echo $data['email']; ?> </td>
							<td> <?php echo $data['telephone']; ?> </td>
							<td> <?php echo $data['description']; ?> </td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
							</td>
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
</body>
</html>