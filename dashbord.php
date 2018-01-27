<?php include ('menu_session.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashbord</title>
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
			<?php 
			if (isset($_SESSION['codeuse'])){
			$sql="SELECT * FROM codeuses
			WHERE id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			$dataU=mysqli_fetch_array($res);
					?>
			<div class="col-sm-2">
				<h4><?php echo $dataU['nom'].' '.$dataU['prenoms']; ?></h4>
				<h5>Née le :<?php echo $dataU['date_naissance']; ?> </h5>
				<h5>Adresse: </h5>
				<h5>Téléphone : <?php echo $dataU['telephone']; ?> </h5>
				<h5>Email: <?php echo $dataU['email']; ?> </h5>
			</div>
			<div class="col-sm-6  text-center">
				<h4><?php echo $dataU['description']; ?></h4>
			</div>
			<div class="col-sm-2  text-center">
				<img src="upload/<?php echo $dataU['photo']; ?>" class="avatar">
				<h4><?php echo $dataU['specialisation']; ?></h4>
				<?php 
				} 
			if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuses.id, facebook, twitter, github FROM cv INNER JOIN codeuses ON codeuses.id=cv.id_codeuse
			WHERE codeuses.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			$dataU=mysqli_fetch_array($res);
					?>
				<ul class="list-inline fa-ul">
					<li><a href="<?php echo $dataU['facebook']; ?>"><i class="fa fa-facebook fa-2x" style=""></i></a>
					</li>
					<li><a href="<?php echo $dataU['twitter']; ?>"><i class="fa fa-twitter fa-2x" style=""></i></a>
					</li>
					<li><a href="<?php echo $dataU['github']; ?>"><i class="fa fa-github fa-2x" style=""></i></a>
					</li>	
				</ul>
				<?php 
			}
		?>
			</div>
		</div>
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;" ></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
			<div class="col-sm-4" style="background-color: lightgrey; height: 60px;"> <h2 style="color: hotpink; font-weight: bold;"> Mes Expériences</h2>
			</div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
		</div>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><h4><b> DEBUT - FIN </b></h4></div>
			<div class="col-sm-2"><h4><b> POSTE OCCUPEE </b></h4></div>
			<div class="col-sm-4"> <h4><b>DESCRIPTION DU POSTE</b></h4>
			</div>
			<div class="col-sm-2"><h4><b>ENTREPRISE</b></h4></div>
		</div>
		<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuses.id, date_debut, date_fin, poste, experiences.description, entreprise FROM experiences INNER JOIN codeuses ON codeuses.id= experiences.id_codeuse WHERE codeuses.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
					?>
		<div class="row" style="margin: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><b>
				<?php echo $dataU['date_debut'].' au '.$dataU['date_fin']; ?></b>
			</div>
			<div class="col-sm-2"><b><?php echo $dataU['poste']; ?></b></div>
			<div class="col-sm-4"><?php echo $dataU['description']; ?></div>
			<div class="col-sm-2"><b><?php echo $dataU['entreprise']; ?></b></div>
		</div>
		<?php 
			}
			}

		?>
		<div class="row" style="margin-bottom: 20px;" >
			<div class="col-sm-2"></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
			<div class="col-sm-4" style="background-color: lightgrey; height: 60px;"> <h2 style="color: hotpink; font-weight: bold;">Mes Diplômes</h2>
			</div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
		</div>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><h4><b> ANNEE D'OBTENTION </b></h4></div>
			<div class="col-sm-2"><h4><b> ECOLE D'OBTENTION</b></h4></div>
			<div class="col-sm-4"> <h4><b>DESCRIPTION DU DIPLOME</b></h4>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuses.id, annee_obtention, ecole_obtention, nom_diplome FROM diplomes INNER JOIN codeuses ON codeuses.id= diplomes.id_codeuse
			WHERE codeuses.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
				# code...
					?>
		<div class="row" style="margin: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><b><?php echo $dataU['annee_obtention']; ?></b></div>
			<div class="col-sm-2"><?php echo $dataU['ecole_obtention']; ?></div>
			<div class="col-sm-4"><?php echo $dataU['nom_diplome']; ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php 
			}
			}

		?>
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
			<div class="col-sm-4" style="background-color: lightgrey; height: 60px;"> <h2 style="color: hotpink; font-weight: bold;">Centres d'interêts</h2>
			</div>
			<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
		</div>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><h4><b>TITRE</b></h4></div>
			<div class="col-sm-2"><h4></div>
			<div class="col-sm-4"> <h4><b>DESCRIPTION DE L'INTERET</b></h4>
			</div>
			<div class="col-sm-2"></div>
				<?php 
if (isset($_SESSION['codeuse'])){
			$sql="SELECT codeuses.id, titre, interets.description FROM interets INNER JOIN codeuses ON codeuses.id= interets.id_codeuse
			WHERE codeuses.id=".$_SESSION['codeuse'];
			$res=mysqli_query($link, $sql);
			while ($dataU=mysqli_fetch_array($res)) {
				# code...
					?>
		<div class="row" style="margin: 15px;">
			<div class="col-sm-2"></div>
			<div class="col-sm-2"><?php echo $dataU['titre']; ?></div>
			<div class="col-sm-2"></div>
			<div class="col-sm-4"><?php echo $dataU['description']; ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<?php 
			}
			}
			
		?>

	</div>
</body>
</html>