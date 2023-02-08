<!DOCTYPE html>
<html>
<title>Acasă</title>
<head>
<!-- <link rel="stylesheet" type="text/css" href="stil.css"> -->
<meta charset="utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1" --> 
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

a{
	margin-right: 5px;: 
}

.navbar-inverse .navbar-nav>li>a{
	color: white;
}

p{
text-align:center;
margin-top:30px;
}

div h1{
	font-family: noto;
}

.h5, h4, h5{
   background: #71ae72;

}

.user h1{
	margin-top:100px;
	color: white ;
	tex-align:left;
}

.col-md-4 {
	margin-top: 30px;
}


.col-md-4 a{
	text-align: center;
	color: #456045;
}

.panel-primary{
	background-color: #c8cd74;
	border-color: #8fb585;
	margin-top: 80px;

}

.panel-primary>.panel-heading{
	background-color: #545b61;
	border-color: #545b61;
}

.btn {
	background-color: #545b61;
	border-color: #545b61;
}

.btn-success:hover{
	background-color: #545b61;
}


</style>
</head>
<body>

	<!------- Antetul paginii ----------->

<section id="header">
	<div class="container text-left">
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
           			<li><a href="autentificare_client.php">Autentificare Client</a>
            		<li><a href="autentificare.php">Autentificare Admin</a></li>
           			<li class="divider"></li>
       			</ul>
            </li>
			<li><a href="inregistrarec.php">Înregistrare</a></li> 
        	
        </ul>
   
</nav>	

<div class="container text-center"> 



		<div class="container">
		<div class="row">

                </div> 
                	<div class="col-md-4">
                		<div class="panel panel-primary">
                		<div class="panel-heading">Căutare după oraş </div> 

 <div class="panel-body">
			<form action="filtrare_camere.php" method="GET">
                              	<div class="form-group">
                              	<label>Oras</label>
                                         <select name="nume_statiune" class="form-control" required>
										 <option value selected ></option>
                    					 <option value="Bucuresti">Bucureşti</option>
                    					 <option value="Buşteni">Buşteni</option>
                    					 <option value="Constanta">Constanţa</option>
                    					 <option value="Costinesti">Costineşti</option>
                    					 <option value="Cluj Napoca">Cluj-Napoca</option>
                    					 <option value="Iasi">Iaşi</option>
                    					 <option value="Mamaia">Mamaia</option>
                    					 <option value="Poiana Braşov">Poiana Braşov</option>
                    					 <option value="Predeal">Predeal</option>
                    					 <option value="Sinaia">Sinaia</option>
                    					 
                  						 </select></div>
				<div class="form-group">
                                	<label>Data Check In</label>
                                        <input type="date" name="check_in" class="form-control" required>
                                            
                               	</div>	
                <div class="form-group">
                                	<label>Data Check Out</label>
                                        <input type="date" name="check_out" class="form-control" required>
                                         
                               	</div>			 
                                          
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">Caută</button>
            </div>
			</form>	

			</div> 
                        
            </div>

  <div class="panel panel-primary">
                		<div class="panel-heading">Filtrare dupa relief </div> 

 <div class="panel-body">
			<form action="filtrare_camere.php" method="GET">
			
                            	<div class="form-group">
                                 	<label>Tip Relief</label>
                                         <select name="relief" class="form-control" required>
										 <option value selected ></option>
                    					 <option value="Mare">Mare</option>
                    					 <option value="Munte">Munte</option>
                    					 <option value="Campie">Câmpie</option>
                  						 </select>

                              	</div>		
                                          
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">Caută</button>
            </div>
			</form>	

			</div>         
            </div> 

            </div>

            <h1>Staţiuni</h1>

			<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
					<div class="container text-center">
					<div class="row">
						<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Poiana Braşov</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

								<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%3%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Sinaia</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

						<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%4%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Buşteni</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

			<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%10%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Predeal</a>							
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

									<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%7%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Cluj-Napoca</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

					<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%8%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Bucureşti</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

				<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%9%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Iaşi</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

</div>

				<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%2%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Mamaia</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

				<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%6%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Costineşti</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

									<?php
					require_once 'connect.php';
					$query = $con->query("SELECT * FROM `statiune` WHERE id_statiune LIKE '%5%' ") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="col-md-4">
							<a href = "hoteluri.php?id_statiune=<?php echo $fetch['id_statiune']?>">Constanţa</a>
							<img src = "img/<?php echo $fetch['poza_statiune']?>"/>
							<h4><?php echo "Regiune ".$fetch['regiune'].""?></h4>
							<h5><?php echo "Relief ".$fetch['relief'].""?></h5>
						</div>

					</div>
					</div>
					</div>
				</div>

					


</body>
</html> 