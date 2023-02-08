<?php
require_once 'connect.php';
	if(ISSET($_POST['salveaza'])){
		$tip = $_POST['tip'];
		$check_in = $_POST['check_in'];
		$check_out = $_POST['check_out'];
		$con->query("UPDATE `rezervare` SET `tip` = '$tip', 
		`check_in` = '$check_in', `check_out` = '$check_out'
		WHERE `id_rezervare` = '$_REQUEST[id_rezervare]' ") or die(mysqli_error());
		header("location:rezervari.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modificare Rezervare</title>
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
				<div class="panel-body">

					<?php
						if (isset($_GET['id_hotel'])) {
						include("connect.php");
						$id_hotel = $_GET['id_hotel']; 
						$modifica = "SELECT * FROM `rezervari` WHERE `id_rezervare` = '$_REQUEST[id_rezervare]' AND  id_hotel= $id_hotel";
						$rs = mysqli_query($con,$modifica);
							while($row=mysqli_fetch_array($rs)){
					
	 							if($id_hotel=="1" ) {  
	 				?>

					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Tip Camera </label>
							<select class = "form-control" required = required name = "tip">
								<option value = ""></option>
								<option value = "Cameră Dublă" <?php if($row['tip'] == "Cameră Dublă"){echo "selected";}?>>Camera Dublă</option>
								<option value = "Cameră de familie" <?php if($row['tip'] == "Cameră de familie"){echo "selected";}?>>Camera de familie</option>
								<option value = "Cameră Dublă Superioară" <?php if($row['tip'] == "Cameră Dublă Superioară"){echo "selected";}?>>Cameră Dublă Superioară</option>
							</select>
						</div>
					</form>
					<?php	} 
	 					if($id_hotel=="2" ) 
						{ 
					?>
					
					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Dublă" <?php if($row['tip'] == "Cameră Dublă"){echo "selected";}?>>Camera Dublă</option>
							<option value = "Cameră de familie" <?php if($row['tip'] == "Cameră de familie"){echo "selected";}?>>Camera de familie</option>
						</select>
					</div>

					<?php	 }
	 					else if($id_hotel=="3" ) 
						{ 	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Dublă" <?php if($row['tip'] == "Cameră Dublă"){echo "selected";}?>>Camera Dublă</option>
							<option value = "Cameră Twin Standard" <?php if($row['tip'] == "Cameră Twin Standard"){echo "selected";}?>>Camera Twin Standard</option>
							<option value = "Apartament Standard" <?php if($row['tip'] == "Apartament Standard"){echo "selected";}?>>Apartament Standard</option>
						</select>
					</div>

					<?php	}
						else if($id_hotel=="4" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Twin" <?php if($row['tip'] == "Cameră Twin Standard"){echo "selected";}?>>Camera Twin Standard</option>
							<option value = "Cameră Dublă" <?php if($row['tip'] == "Cameră Dublă"){echo "selected";}?>>Camera Dublă</option>
							<option value = "Apartament Standard" <?php if($row['tip'] == "Apartament Standard"){echo "selected";}?>>Apartament Standard</option>
						</select>
					</div>

					<?php	}
						else if($id_hotel=="5" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră de familie" <?php if($row['tip'] == "Cameră de familie"){echo "selected";}?>>Camera de familie</option>
							<option value = "Cameră Dublă Superioară" <?php if($row['tip'] == "Camera Dublă Superioară"){echo "selected";}?>>Camera Dublă Superioară</option>
							<option value = "Cameră Dublă" <?php if($row['tip'] == "Cameră Dublă"){echo "selected";}?>>Camera Dublă</option>
						</select>
					</div>

					<?php	} 

	 					else if($id_hotel=="6" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Dublă Standard" <?php if($row['tip'] == "Cameră Dublă Standard"){echo "selected";}?>>Camera Dublă Standard</option>
							<option value = "Cameră Dublă Deluxe" <?php if($row['tip'] == "Cameră Dublă Deluxe"){echo "selected";}?>>Camera Dublă Deluxe</option>
							<option value = "Apartament Executive" <?php if($row['tip'] == "Apartament Executive"){echo "selected";}?>>Apartament Executive</option>
						</select>
					</div>

					<?php	}	
						else if($id_hotel=="7" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Dublă Standard" <?php if($row['tip'] == "Cameră Dublă Standard"){echo "selected";}?>>Camera Dublă Standard</option>
							<option value = "Cameră Twin Standard" <?php if($row['tip'] == "Cameră Twin Standard"){echo "selected";}?>>Camera Twin Standard</option>
							<option value = "Apartament Standard" <?php if($row['tip'] == "Apartament Standard"){echo "selected";}?>>Apartament Standard</option>
						</select>
					</div>

					<?php	}	
						else if($id_hotel=="8" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Cameră Single" <?php if($row['tip'] == "Cameră Single"){echo "selected";}?>>Camera Single</option>
							<option value = "Cameră Dublă Standard" <?php if($row['tip'] == "Cameră Dublă Standard"){echo "selected";}?>>Camera Dublă Standard</option>
							<option value = "Cameră Dublă Deluxe "<?php if($row['tip'] == "Cameră Dublă Deluxe"){echo "selected";}?>>Cameră Dublă Deluxe</option>
						</select>
					</div>

					<?php	}
						else if($id_hotel=="9" ) 
						{	
					?>

					<div class = "form-group">
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Camera Twin" <?php if($row['tip'] == "Camera Twin"){echo "selected";}?>>Camera Twin</option>
							<option value = "Camera Dublă" <?php if($row['tip'] == "Camera Dublă"){echo "selected";}?>>Camera Dublă</option>
						</select>
					</div>

					<?php	}
						else if($id_hotel=="10" ) 
						{	
					?>
				
					<div>
						<label>Tip Camera </label>
						<select class = "form-control" required = required name = "tip">
							<option value = ""></option>
							<option value = "Camera Superior" <?php if($row['tip'] == "Camera Superior"){echo "selected";}?>>Camera Superior</option>
							<option value = "Camera Deluxe" <?php if($row['tip'] == "Camera Deluxe"){echo "selected";}?>>Camera Deluxe</option>
							<option value = "Apartament Deluxe" <?php if($row['tip'] == "Apartament Deluxe"){echo "selected";}?>>Apartament Deluxe</option>
						</select>
					</div>

					<?php	}
							}
						} 
					?>

					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Categorie Cameră</label>
							<input type = "number"  min = "0" max = "10" value = "<?php echo $row['nr_camere']?>" class = "form-control" name = "nr_camere" />
						</div>
						<div class = "form-group">
							<label>Check In</label>
							<input type = "date" required = "required" value = "<?php echo $row['check_in']?>" class = "form-control" name = "check_in" />
						</div>
						<div class = "form-group">
							<label>Check Out</label>
							<input type = "date" required = "required" value = "<?php echo $row['check_out']?>" class = "form-control" name = "check_out" />
						</div>
						<div class = "form-group">
							<button name = "salveaza" class = "btn btn-success "> Salvează Modificarea</button>
						</div>
					</form>	
	    	</div>
    	</div>
  	</div>
	</body>
</html>