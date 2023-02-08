<!DOCTYPE html>
<html>
	<head>
		<title>Listă Camere</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stil.css">
		<link href="cs/bootstrap.min.css" rel="stylesheet"> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>

	<body class="body">


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

		<div class="container text-left">
			<div class="users">
				<?php  
				include('connect.php');
					if(ISSET($_GET['id_camera'])){
					$id_camera = $_GET['id_camera'];
					$query = "SELECT tip FROM camere, tip_camera WHERE camere.id_tip_camera= tip_camera.id_tip_camera AND camere.id_camera ='$id_camera'"; 
					$rand = mysqli_query($con,$query);
					$fetch=mysqli_fetch_array($rand) 
				?>
				<h1><?php echo $fetch['tip']?></h1>
			</div>

			<?php 
			}?>
	

			<div class="container text-center">
				<div class="col-md-10">
					<div class="jumbotron">
		        		<div class="w3-content w3-section">
							<?php 
								$query = "SELECT poze_camere FROM poze_camera,
								camere WHERE camere.id_camera=poze_camera.id_camera AND camere.id_camera ='$id_camera'"; 
								$rand = mysqli_query($con,$query);
								while($fetch=mysqli_fetch_array($rand)){ ?> 
		            				<img class="mySlides w3-animate-fading" src="img/<?php echo $fetch['poze_camere']?>">
									<?php 
								}
							?>
 						</div>    
        			</div>
				</div>
			</div>		

			<div class="container">
 				<div class="col-md-8">
					<h3>Facilităţi</h3>

					<?php
						$query = "SELECT lista_facilitati FROM camere, facilitati, facilitati_camere, tip_camera WHERE camere.id_tip_camera= tip_camera.id_tip_camera AND tip_camera.id_tip_camera = facilitati_camere.id_tip_camera AND facilitati.id_facilitati = facilitati_camere.id_facilitati AND camere.id_camera = '$id_camera'"; 
						$rand = mysqli_query($con,$query);
						while($fetch=mysqli_fetch_array($rand)){ ?>
							<p><?php echo "⁓ ".$fetch['lista_facilitati']?></p>
							<?php 
						}
					?>
				</div>

				<?php  
					$query = "SELECT pret_camera, id_camera FROM camere, tip_camera WHERE camere.id_tip_camera= tip_camera.id_tip_camera AND camere.id_camera ='$id_camera'"; 
					$rand = mysqli_query($con,$query);
					while($fetch=mysqli_fetch_array($rand)){ ?>
						<div class="col-md-3">
							<h4><?php echo "Preţ Cameră: ".$fetch['pret_camera']." RON/noapte"?></h4>
          				</div>
						<?php 
					}
				?>
			</div>

			<h2>Listă Categorie Camere</h2>
			<?php 	
				$query = "SELECT subtip, poza, id_subt_camera FROM  subtip_camera WHERE subtip_camera.id_camera ='$id_camera'"; 
				$rand = mysqli_query($con,$query);
				while($fetch=mysqli_fetch_array($rand)){ ?>
					<div class="col-md-4">
						<img src = "img/<?php echo $fetch['poza']?>"/>
						<h3><?php echo "Cameră ". $fetch['subtip']?></h3>
						<a class="btn btn-info" href="rezerva_camera.php?id_subt_camera=<?php echo $fetch['id_subt_camera']?>">Rezervă</a>
						<br><br>
					</div>	
					<?php
				}
			?>
		</div>

	    <script src="my_js/slide.js"></script>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

	</body>
</html> 