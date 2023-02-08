<?php
	if(!isset($_GET["id_rezervare"])) {
				
		header("location:plata.php");
	}
	else {
		include('connect.php');
		$id_rezervare = $_GET['id_rezervare'];
		$rez ="SELECT * FROM rezervare,camere,clienti,tip_camera, subtip_camera 
		WHERE subtip_camera.id_subt_camera = rezervare.id_subt_camera 
		AND tip_camera.id_tip_camera = camere.id_tip_camera
		AND camere.id_camera=subtip_camera.id_camera 
		AND clienti.id_client = rezervare.id_client
		AND id_rezervare = '$id_rezervare'";
		$re = mysqli_query($con,$rez);
		while($row=mysqli_fetch_array($re))
		{
			$nume = $row['nume'];
			$prenume = $row['prenume'];
			$tip = $row['tip'];
			$subtip = $row['subtip'];
			$pret_camera = $row['pret_camera'];
			$adulti = $row['adulti'];
			$copii = $row['copii'];
			$check_in = $row['check_in'];
			$check_out = $row['check_out'];
			$stadiu = $row['stadiu'];

		}
	}	
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmare rezervare</title>
		<link rel="stylesheet" type="text/css" href="stil.css">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>

	<body class="body">

		<section class="header">
			<div class="container text-left">
				<div class="user">
					<h1><b> SISTEM DE REZERVĂRI ONLINE </b></h1>
				</div>
			</div>
		</section>

		<!------------------- Bara de navigare ----------------------->

		<nav class="navbar-inverse navbar-default">
		  	<div class="container-fluid">
		     	<ul class="nav navbar-nav navbar-right">
			        <li><a href="rezervari.php">Rezervari</a></li>
			        <li><a href="plata.php">Plata Rezervare</a></li>
			        <li><a href="index.php">Deconectare</a></li>
		    	</ul>
		 	</div> 
		</nav>

		<div class="container">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="table-responsive">
					<form method="post">
	                    <table class="table">
	                        <tr>
	                            <th class="th">COLOANE</th>
	                            <th class="th">DATE PERSONALE</th>      
	                        </tr>
	                        <tr>
	                            <th>Nume</th>
	                            <th><?php echo $nume; ?> </th>  
	                        </tr>
	                        <tr>
	                            <th>Prenume</th>
	                            <th><?php echo $prenume; ?> </th>  
	                        </tr>
							<tr>
	                            <th>Tip Camera</th>
	                            <th><?php echo $tip; ?> </th>
	                        </tr>
	                        <tr>
	                            <th>Categorie</th>
	                            <th><?php echo $subtip; ?> </th> 
	                        </tr>
							<tr>
	                            <th>Numar Adulti </th>
	                            <th><?php echo $adulti;  ?></th>  
	                        </tr>
							<tr>
	                           	<th>Numar Copii </th>
	                            <th><?php echo $copii; ?></th>
	                        </tr>
							<tr>
	                            <th>Check In </th>
	                            <th><?php echo $check_in; ?></th> 
	                        </tr>
							<tr>
	                            <th>Check Out </th>
	                           	<th><?php echo $check_out; ?></th>
	                        </tr>
	                        <tr>
	                            <th>Stadiu rezervare</th>
	                            <th><?php echo $stadiu; ?></th>
	                        </tr>
	                    </table>

						<div class="text-right">
							<div class="form-group">
								<button  type="submit" name="confirma" class="btn btn-success">CONFIRMA</button>      	            
	                		</div>
						</div>
	                </form>
	            </div>
	        </div>
	    </div>
	</body>
</html>

<?php
include("connect.php");
	if(isset($_POST['confirma'])){
		$id_rezervare = $_GET['id_rezervare'];
		$stadiu = "Confirmată";
		if($stadiu =="Confirmată"){
			$update = "UPDATE `rezervare` SET `stadiu`='$stadiu' WHERE id_rezervare = '$id_rezervare'";
			$confirm = "SELECT camere.pret_camera, rezervare.check_in,rezervare.check_out FROM rezervare,camere,tip_camera 
			WHERE camere.id_camera = rezervare.id_camera AND tip_camera.id_tip_camera = camere.id_tip_camera
			AND id_rezervare='$id_rezervare'";
							
			if( mysqli_query($con,$update)){
				$earlier = new DateTime($check_in);
				$later = new DateTime($check_out);
				$nr_zile = $earlier->diff($later)->format("%r%a");
				$valoare_totala = $pret_camera * $nr_zile;											
				$rezervă = "INSERT INTO `plata`(`id_rezervare`, `valoare_totala`) VALUES ('$id_rezervare','$valoare_totala')";

				if(mysqli_query($con,$rezervă)){
					echo "<script type='text/javascript'> alert('Rezervare Confirmată')</script>";
					echo "<script type='text/javascript'> window.location='plata.php'</script>";

				}		
			} 
		}
	}						
?>

