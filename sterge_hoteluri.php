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
					<h1><b> SISTEM DE REZERVĂRI ONLINE </b></h1>
				</div>
			</div>
		</section>


		<nav class="navbar-inverse navbar-default">
		  	<div class="container-fluid">
				<ul class="nav navbar-nav navbar-right">
		          	<li><a href="lista_rezervari.php">Rezervari</a></li>
		          	<li><a href="index.php">Deconectare</a></li>
		        </ul>
		   	</div>
		</nav>

		<div class="container">
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
						<thead class="thead-dark">
                            <tr>
                                <th class="th">Numar</th>
                               	<th class="th">Nume Hoteluri</th>						
                            </tr>
                      	</thead>

                        <tbody>
							<?php
								include("connect.php");
								$query = $con->query( "SELECT * FROM `hotel`");
								{
									while ($num = $query->fetch_array(MYSQLI_ASSOC)) { 
										echo"<tr>
											<th>".$num['id_hotel']."</th>
											<th>".$num['nume_hotel']."</th>
											<th><a href = 'stergere_hoteluri.php?id_hotel=".$num['id_hotel']." ' class = 'btn btn-danger'> Sterge</a><th>
										</tr>";	
									} 
								}	
							?>
                                    
                        </tbody>
                    </table>	
                </div>
            </div>
        </div>				   
	</body>
</html>