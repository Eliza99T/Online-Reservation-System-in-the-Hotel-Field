<!DOCTYPE html>
<html>
	<head>
		<title>Pagină filtrare camere</title>
		<link rel="stylesheet" type="text/css" href="stil.css">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

	<body class="body">

		<!------- Antetul paginii ----------->

		<section class="header">
			<div class="container text-left">
				<div class="user">
				</div>
			</div>
		</section>

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

		<?php require "connect.php";

			if(isset($_GET['submit'])){
  
  	  	if(isset($_GET['nume_statiune'])){
   				$nume_statiune = $_GET['nume_statiune'];
   				$check_in = $_GET['check_in'];
   				$check_out = $_GET['check_out'];
   			
   				$submit = mysqli_real_escape_string($con, $_GET['nume_statiune']);
					$modifica = "SELECT statiune.nume_statiune, camere.poza_camere, hotel.nume_hotel,tip_camera.tip, 
					camere.pret_camera, camere.id_camera
					FROM camere,hotel,tip_camera, statiune 
					WHERE hotel.id_hotel = camere.id_hotel
					AND nume_statiune='$nume_statiune'
					AND tip_camera.id_tip_camera = camere.id_tip_camera
					AND statiune.id_statiune=hotel.id_statiune
					AND statiune.nume_statiune ='$submit'";

					$rand = mysqli_query($con,$modifica);
					while($row=mysqli_fetch_array($rand)){

					?>	
					<div class="row">
						<div class =" col-md-4" id="imagini">
							<img src = "img/<?php echo $row['poza_camere']?>"/>
						</div>
						<div class="col-md-4" id="description">
							<h2><?php echo "Hotel: ".$row['nume_hotel']." /".$row['nume_statiune']?></h2>
							<h3><?php echo "Tip: ".$row['tip'].""?></h3>
							<h3><?php echo "Preţ: ".$row['pret_camera']." RON/noapte"?></h3>	
						</div>
						<div class="col-md-3">
							<a href = "selecteaza_camere.php?id_camera=<?php echo $row['id_camera']?>"id="buton" class = " btn btn-info">Detalii Cameră</a>
						</div>
					</div>
					<?php 
					}
				}
			}
		?>

   	<?php
  		require "connect.php";
  		if (isset($_GET['submit'])){
  			if (isset($_GET['regiune'])){
   
   				$relief = $_GET['regiune'];
   				$submit = mysqli_real_escape_string($con, $_GET['regiune']);
					$da = "SELECT statiune.nume_statiune, camere.poza_camere, hotel.nume_hotel,tip_camera.tip, camere.pret_camera, camere.id_camera 
					FROM `statiune`, camere, hotel,tip_camera
					WHERE statiune.id_statiune = hotel.id_hotel 
					AND hotel.id_hotel = camere.id_hotel
					AND tip_camera.id_tip_camera = camere.id_tip_camera 
			 		AND statiune.regiune ='$submit'";

					$rand = mysqli_query($con,$da);
					while($fetch=mysqli_fetch_array($rand)){
					?>
						 
					<div class="row">
						<div class =" col-md-4">
							<img src = "img/<?php echo $row['poza_camere']?>"/>
						</div>
						<div class="col-md-4">
							<h2><?php echo "Statiune ".$row['nume_statiune'].""?></h2>
							<h3><?php echo "Hotel: ".$row['nume_hotel'].""?></h3>
							<h3><?php echo "Tip: ".$row['tip'].""?></h3>
							<h3><?php echo "Pret: ".$row['pret_camera']." RON/noapte"?></h3>	
						</div>
						<div class="col-md-3">
							<a href = "selecteaza_camere.php?id_camera=<?php echo $row['id_camera']?>" class = "btn btn-info">Detalii Camera</a>
						</div>
					</div>
					<?php 
					}
				}
			} 
		?>

		<div class="container text-center">
   
			<?php require "connect.php";
  			if (isset($_GET['submit'])){
	  			if (isset($_GET['relief'])){
	   
	   				$relief = $_GET['relief'];
	   				$submit = mysqli_real_escape_string($con, $_GET['relief']);
						$da = ("SELECT statiune.relief, hotel.poza_hotel, hotel.nume_hotel, hotel.descriere, hotel.id_hotel 
						FROM `statiune` JOIN `hotel` ON statiune.id_statiune = hotel.id_statiune 
						WHERE statiune.relief ='$submit'"); 
						$rand = mysqli_query($con,$da);
						while($fetch=mysqli_fetch_array($rand)){
						?>

						<div class="row">
							<div class =" col-md-4">
								<img src = "img/<?php echo $fetch['poza_hotel']?>"/>
							</div>
							<div class="col-md-4">
								<h3><?php echo "Hotel: ".$fetch['nume_hotel'].""?></h3>
								<p><?php echo $fetch['descriere']?></p>
							</div>
							<div class="col-md-3">
								<a href = "camere_hoteluri.php?id_hotel=<?php echo $fetch['id_hotel']?>" class = "btn btn-info">Detalii Hotel</a>
							</div>
						</div>
						<?php
 						}
					}
				} 
			?>

		</div>
	</body>
</html> 