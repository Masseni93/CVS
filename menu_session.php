<?php include('connect.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<head lang="fr">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css" >
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
	<nav class=" navbar navbar-default" >
		<a class="navbar-brand" href="index.php"> Sheisthecode CV</a>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="">A propos</a>
			</li>
			<li>
					<?php 
					if (isset($_SESSION['codeuse'])) {
					$sql="SELECT * FROM codeuses WHERE id=".$_SESSION['codeuse'];
					$req=mysqli_query($link,$sql);
					$data=mysqli_fetch_array($req);
					?>
				 	<a href="dashbord.php"><img src="upload/<?php echo $data['photo']; ?>" style="width: 50px; height: 40px; border-radius: 50%; margin-top: -9px;"></a>
				 	<?php
					}				 
				 ?>	
			</li>
			<li>
				<form method="POST">
				<button class="btn-medium" name="deconnexion" style="margin: 10px;">Deconnexion</button>
				</form>
				<?php 
				if (isset($_POST['deconnexion'])) {
				 session_destroy();
				}				 
				 ?>	
			</li>
		</ul>
	</nav>
</body>
</html>