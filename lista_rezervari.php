<!DOCTYPE html>
<html>
	<head>
		<title>Pagina de admin</title>
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
				</div>
			</div>
		</section>


		<!------------------- Bara de navigare ----------------------->

		<nav class="navbar-inverse navbar-default">
		  	<div class="container-fluid">
			    <ul class="nav navbar-nav navbar-right">
			       	<li><a href="lista_rezervari.php">Rezervari</a></li>
			        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Adaugă</a>
			            <ul class="dropdown-menu">
			           		<li><a href="adauga_statiune.php">Adaugă Staţiune</a></li>
			            	<li><a href="adauga_hoteluri.php">Adaugă Hoteluri</a></li>
			            	<li><a href="adauga_camera.php">Adaugă Camere</a></li>
			            	<li><a href="adauga_subcamera.php">Adaugă Subtipuri de camere</a></li>
			                <li><a href="adauga_facilitati.php">Adaugă Facilitati</a></li>
			           		<li class="divider"></li>
			       		</ul>
			        </li>
			        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Modifică</a>
			            <ul class="dropdown-menu">
			           		<li><a href="modifica_statiune.php">Modifică Staţiune</a></li>
			            	<li><a href="modifica_hoteluri.php">Modifică Hoteluri</a></li>
			            	<li><a href="modifica_camere.php">Modifică Camere</a></li>
			            	<li><a href="modifica_subcamera.php">Modifică Subtipuri de camere</a></li>
			                <li><a href="modifica_facilitati.php">Modifică Facilitati</a></li>
			           		<li class="divider"></li>
			       		</ul>
			        </li>
			        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Şterge</a>
			           	<ul class="dropdown-menu">
			           		<li><a href="sterge_statiune.php">Şterge Staţiune</a></li>
			            	<li><a href="sterge_hoteluri.php">Şterge Hoteluri</a></li>
			            	<li><a href="sterge_camere.php">Şterge Camere</a></li>
			            	<li><a href="sterge_subcamera.php">Şterge Subtipuri de camere</a></li>
			                <li><a href="sterge_subcamera.php">Şterge Facilitati</a></li>
			           		<li class="divider"></li>
			       		</ul>
			        </li>
			        <li><a href="index.php">Deconectare</a>
			        </li>
			    </ul>
			</div>
		</nav>

 
		<div class="panel-body">
            <div class="table-responsive">
                <table class="table">
					<thead class="thead-dark">
                        <tr>
                           	<th class="th">Nume</th>
                            <th class="th">Prenume</th>
                            <th class="th">Nume Hotel</th>
                            <th class="th">Tip Camera</th>
                            <th class="th">Categorie</th>
					 		<th class="th">Adulti</th>
							<th class="th">Copii</th> 
							<th class="th">Check_in</th>
							<th class="th">Check_out</th>								
                        </tr>
                    </thead>
                    <tbody>

						<?php
							include("connect.php");
							$query = $con->query( "SELECT * FROM `rezervare`, `camere`,`clienti`,`hotel`, `tip_camera`, subtip_camera WHERE tip_camera.id_tip_camera = camere.id_tip_camera AND camere.id_camera = subtip_camera.id_camera AND hotel.id_hotel = camere.id_hotel AND subtip_camera.id_subt_camera = rezervare.id_subt_camera AND  clienti.id_client = rezervare.id_client AND `stadiu` = 'Neconfirmata'"); {
								while ($num = $query->fetch_array(MYSQLI_ASSOC)) { 
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
									</tr>";	
								} 
							}		
						?>             
                    </tbody>
                </table>			
            </div>
        </div>	
	</body>
</html>			
