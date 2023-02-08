<?php
	include('connect.php');
?>

<!DOCTYPE html>
<html>
<title>Pagina de rezervări</title>
<head>
<link rel="stylesheet" type="text/css" href="stil.css"> -->
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>


#header{
	background: url("./img/antet.jpg");
	width: 100%;
	height:400px;
	background-position: center;
	background-size:cover;
	background-attachment: fixed;

}
img{
	max-width: 100%;
  	padding-top: 20px;
	margin-top: 5px;
 	margin-bottom: 3px;
  	padding-bottom: 20px;

}
body{
	background: url("./img/bod.jpg");
	background-size: cover;

}

.container text-left{
height: 400px;
}

div h1{
	font-family: noto;
}


.user h1{
	margin-top:100px;
	color: white ;
	text-align:left;
}

.col-md-4 a{
	text-align: center;
}

th{
    font-weight: normal;
}



</style>
</head>
<body>

<section id="header">
	<div class="container text-left">
		<div class="user">
			<h1><b> SISTEM DE REZERVĂRI ONLINE </b></h1>
		</div>
	</div>
</section>



<nav class="navbar-inverse navbar-default">
  <div class="container-fluid">
      	</ul>
      	
      	<ul class="nav navbar-nav navbar-right">
        	
        	<li><a href="plata.php">Plata Rezervare</a></li> 
        	        	<li><a href="index.php">Deconectare</a></li>
        	</li>
        </ul>
  
</nav>

<div class="container">
 
 
<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
				<thead class="thead-dark">
                                  
                                        <tr>
                                       		<th>Nume</th>
                                       		<th>Prenume</th>
                                       		<th>Nume Hotel</th>
                                            	<th>Tip Camera</th>
                                           		<th>Categorie</th>
					 	<th>Adulti</th>
						<th>Copii</th> 
						<th>Check_in</th>
						<th>Check_out</th>
						<th>Stadiu</th>
																	
                                        </tr>
                                    </thead>
                                    <tbody>

       
									<?php
									include("connect.php");
	if(ISSET($_GET['id_client'])){
	$id_client = $_GET['id_client'];
								

									$query = $con->query("SELECT clienti.nume, clienti.prenume, hotel.nume_hotel, tip_camera.tip,subtip_camera.subtip, rezervare.adulti, rezervare.copii, rezervare.check_in, rezervare.check_out, rezervare.id_rezervare, subtip_camera.id_subt_camera FROM tip_camera JOIN camere ON tip_camera.id_tip_camera = camere.id_tip_camera
									JOIN hotel ON hotel.id_hotel = camere.id_hotel
									JOIN subtip_camera ON camere.id_camera = subtip_camera.id_camera 
									JOIN rezervare ON subtip_camera.id_subt_camera = rezervare.id_subt_camera
									JOIN clienti ON clienti.id_client = rezervare.id_client 
									WHERE clienti.id_client = '$id_client' AND `stadiu` = 'Neconfirmata'
									") or die("Last error: {$con->error}\n"); 
									$num = $query->fetch_assoc();

											echo"<tr>
												<th>".$num['nume']."</th>
												<th>".$num['prenume']."</th>
												<th>".$num['nume_hotel']."</th>
												<th>".$num['tip']."</th>
												<th>".$num['subtip']."</th>
												<th>".$num['adulti']."</th>
												<th>".$num['copii']."</th>
												<th>".$num['check_in']."</th>
												<th>".$num['check_out']."</th>
										
												<th><a href='confirma_rezervare.php?id_rezervare=".$num['id_rezervare']." ' class='btn btn-info'>Confirma</a></th>
												<th><a href='modifica_rezervare.php?id_rezervare=".$num['id_rezervare']." ' class='btn btn-warning'>Modifica</a></th>
												<th><a href = 'sterge_rezervare.php?id_rezervare=".$num['id_rezervare']." ' class = 'btn btn-danger'> Sterge</a><th>

												</tr>";
										
									
									};
									?>
                                        
                                    </tbody>
                                </table>

								
                            </div>
                        </div>
                    </div>

					
