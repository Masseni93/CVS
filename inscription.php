<?php include 'menu.php';
		if (isset($_POST['btnValider'])) {
			if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) 
				{
					$sql="SELECT * FROM codeuses WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
					$req= mysqli_query($link, $sql);
					if (mysqli_num_rows($req)>0) {
						echo "l'email existe déja";
						}else{
						$sql= "INSERT INTO codeuses (nom, prenoms, date_naissance, photo, specialisation, email, telephone, mdp, description) VALUES ('".mysqli_real_escape_string($link, $_POST['nom'])."', '".mysqli_real_escape_string($link, $_POST['prenoms'])."', '".mysqli_real_escape_string($link,$_POST['date_naissance'])."', '".$_FILES['photo']['name']."', '".mysqli_real_escape_string($link, $_POST['specialisation'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".$_POST['telephone']."', '".mysqli_real_escape_string($link, md5($_POST['mdp']))."', '".mysqli_real_escape_string($link, $_POST['description'])."')";
						$res=mysqli_query($link, $sql);
							if ($res) {
							echo "Inscription terminée";
							}else{
							$res=mysqli_error($link);
							}
					}
			}
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription </title>
</head>
<body style="background-color: lemonchiffon;
">
<div class="container">
	<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Formulaire D'inscription </legend>
			<span></span>
				<div class="form-group">
					<label for="">Nom</label>
						<input name="nom" type="text" class="form-control" id="" placeholder="Nom" value="">
				</div>
				<div class="form-group">
					<label for="">Prenoms</label>
						<input name="prenoms" type="text" class="form-control" id="" placeholder="Prenoms" value="">			
				</div>
				<div class="form-group">
					<label for="">Date de naissance</label>
						<input name="date_naissance" type="text" class="form-control" id="" placeholder="aaaa-mm-jj" value="">
				</div>
				<div class="form-group">
					<label for="">Resume</label>
						<textarea name="description" type="text" class="form-control" id="" placeholder="Décrivez-vous"></textarea>
				</div>
				<div class="form-group">
					<label for="">Email</label>
						<input name="email" type="email" class="form-control" id="" placeholder="Email" value="">			
				</div>
				<div class="form-group">
					<label for="">Téléphone</label>
						<input name="telephone" type="number" class="form-control" id="" placeholder="Numéro de téléphone" value="">	
				</div>
				<div class="form-group">
					<label for="">Spécialisation</label>
						<input name="specialisation" type="text" class="form-control" id="" placeholder="Votre spécialisation" value="">	
				</div>
				<div class="form-group">
					<label for="">Mot de passe</label>
						<input name="mdp" type="password" class="form-control" id="" placeholder="Mot de passe" value="">	
				</div>
				<div class="form-group">
							<label for="">Photo du CV</label>
							<input name="photo" type="file" class="form-control" id="" placeholder=" Choisissez une photo" value="">
						</div>
				<div class="form-group">
					<button name="btnValider" type="submit" class=" btn-medium btn-lg">Valider</button>
				</div>
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>
</div>
</body>
</html>