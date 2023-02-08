<?php
	include('connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Plata Rezervării</title>
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
			<h1> Rezervare Confirmată</h1>
			<div class="panel-body">
		     <table class="table">
					<thead class="thead-dark">  
		       	<tr> 
							<th class="th">Check_in</th>
							<th class="th">Check_out</th>
							<th class="th">Preţ Total Cameră</th>										
		        </tr>
		      </thead>
		      <tbody>

					<?php 
						if(ISSET($_GET['id_rezervare'])){
						$id_rezervare = $_GET['id_rezervare'];
						$plati = "SELECT * FROM `rezervare`,`plata` WHERE rezervare.id_rezervare = plata.id_rezervare AND rezervare.id_rezervare ='$id_rezervare'";
							if ($da = $con->query($plati)) {
    							while ($num = $da->fetch_assoc()) {
									echo"<tr>
										<th>".$num['check_in']."</th>
										<th>".$num['check_out']."</th>
										<th>".$num['valoare_totala']."</th>
									</tr>";
								}
							}
						}
					?>    
          		</tbody>
       		 </table>
      	</div>
    </div>
  </body>
</html>