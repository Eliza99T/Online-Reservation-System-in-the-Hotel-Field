<!DOCTYPE html>
<html>
	<head>
		<title>Listă Hoteluri</title>
		<link rel="stylesheet" type="text/css" href="stil.css"> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
				if(ISSET($_GET['id_statiune'])){
					$id_statiune = $_GET['id_statiune'];
					$query = $con->query("SELECT hotel.poza_hotel, hotel.nume_hotel, hotel.descriere, hotel.id_hotel FROM statiune JOIN hotel ON statiune.id_statiune = hotel.id_statiune 
					WHERE statiune.id_statiune = '$id_statiune'
					ORDER BY hotel.id_hotel ASC;") or die("Last error: {$con->error}\n");
				}
			?>

			<?php 
				while ($fetch = $query->fetch_array(MYSQLI_ASSOC)) { 
			?>

			<div class="row">
				<div class="col-md-4">
					<img src = "img/<?php echo $fetch['poza_hotel']?>"/>
				</div>
				<div class="col-md-4">
					<h3><?php echo $fetch['nume_hotel']?></h3>
					<p><?php echo $fetch['descriere']?></p>
				</div>
							
				<div class=" col col-md-3">
          <a id="da" class="btn btn-success" href="camere_hoteluri.php?id_hotel=<?php echo $fetch['id_hotel']?>">Detalii</a>
        </div>
			</div>

			<?php 
				}
			?>

		</div> <br><br>
	</body>
</html> 