<!DOCTYPE html>
<html>
<head>
	<title>Sheisthecode CV </title>
</head>
<body style="background-color: lemonchiffon;
">
<?php include('menu.php'); ?>
<div class="container">
	<?php 
		$list=" SELECT * FROM codeuses ";
		$res= mysqli_query($link,$list);
		while ($data = mysqli_fetch_array($res)){		
					?>
	<div class="row text-center accueil" style="margin-bottom: 20px;">
	<div class="col-sm-4">
		<img class="avatar" src="upload/<?php echo $data['photo'];  ?>" alt="" style="margin-top: 20px;">
		<h4 style="margin-top: 20px;"><?php echo $data['nom'].' '.$data['prenoms'];?></h4>
	</div>
	<div class="col-sm-4" style="padding: 20px 0px;"><h4><?php echo $data['specialisation'];?></h4>
		<h5 style="margin-top: 20px;"><?php echo $data['description'];?></h5>
	</div>
	<div class="col-sm-4" style="padding: 50px 0px;">
		<button class="btn btn-primary" type="submit"><a href="consulter.php?id=<?php echo $data['id']; ?>" style="text-decoration: none; "> consultez le cv </a></button>
	</div>
	</div>
	<?php  
		}
	?>
	
</div>
</body>
</html>
