<!DOCTYPE html>
<html>
	<head>
		<title>Camere Hoteluri</title>
		<link rel="stylesheet" type="text/css" href="stil.css">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

	<body class="body">

	<!------- Antetul paginii ----------->

	<section class="header">
		<div class="container">
			<div class="user">
			</div>
		</div>
	</section>

	<!------------------- Bara de navigare ----------------------->

	<nav class="navbar-inverse navbar-default">
  	<div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Acasă</a></li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Autentificare</a>
          <ul class="dropdown-menu">
           	<li><a href="autentificare_client.php">Autentificare Client</a></li>
            <li><a href="autentificare.php">Autentificare Admin</a></li>
           	<li class="divider"></li>
       		</ul>
        </li>
      </ul>
 		</div>
  </nav>	

	<div class="container text-center">
		<?php require_once 'connect.php';
			if(ISSET($_GET['id_hotel'])){
			$id_hotel = $_GET['id_hotel'];
			$query = $con->query("SELECT camere.poza_camere, hotel.nume_hotel, tip_camera.tip, camere.pret_camera, camere.id_camera FROM statiune JOIN hotel ON statiune.id_statiune = hotel.id_statiune 
				JOIN camere ON hotel.id_hotel = camere.id_hotel 
				JOIN tip_camera ON camere.id_tip_camera = tip_camera.id_tip_camera 
				WHERE hotel.id_hotel = '$id_hotel'
				ORDER BY camere.pret_camera ASC;") or die("Last error: {$con->error}\n");
			}
		?>

		<?php 
			while ($fetch = $query->fetch_array(MYSQLI_ASSOC)) { 
		?>
							
		<div class="row">
			<div class="col-md-4">
				<img src = "img/<?php echo $fetch['poza_camere']?>"/>
			</div>
			<div class="col-md-4">
				<h3><?php echo $fetch['tip']?></h3>
				<h4><?php echo "Pret: ".$fetch['pret_camera']." RON/noapte"?></h4>
			</div>		
			<div class="col-md-3">
        <a id="buton" class="btn btn-info" href="selecteaza_camera.php?id_camera=<?php echo $fetch['id_camera']?>">Selecteaza</a>
      </div>
		</div>

		<?php }?>	

	</body>
</html> 