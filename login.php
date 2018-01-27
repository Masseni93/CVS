<?php include('menu.php');
if(isset($_POST['btnValider'])) {
	$sql="SELECT * FROM codeuses WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' AND mdp='".mysqli_real_escape_string($link, md5($_POST['mdp']))."' LIMIT 0, 1";
	$req= mysqli_query($link, $sql);
		if (mysqli_num_rows($req)>0) {
		$data= mysqli_fetch_array($req);
		$_SESSION['codeuse']=$data['id'];
		header('location:dashbord.php');
		}else{
		echo "identifiant incorrect";
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
			<legend>Connectez-vous </legend>
			<span></span>
				<div class="form-group">
					<label for="">Email</label>
						<input name="email" type="email" class="form-control" id="" placeholder="Email" value="">
				</div>
				<div class="form-group">
					<label for="">Mot de passe</label>
						<input name="mdp" type="password" class="form-control" id="" placeholder="Votre mot de passe" value="">			
				</div>
				<div>
					<button name="btnValider" type="submit" class=" btn-medium btn-lg">Valider</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>