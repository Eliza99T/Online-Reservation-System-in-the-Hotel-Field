<?php require_once 'connect.php';
	
	if(isset($_POST['submit'])){
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
		$adulti = $_POST['adulti'];
		$copii = $_POST['copii'];
		$check_in = $_POST['check_in'];
		$check_out = $_POST['check_out'];
		$stadiu ="Neconfirmata";
		$rezervare = "INSERT INTO `clienti`(`nume`, `prenume`) VALUES ('$_POST[nume]','$_POST[prenume]')";
		mysqli_query($con,$rezervare);
		$id_client = "Select max(id_client) as id_client from clienti";
		$rs_id = mysqli_query($con,$id_client);

		$fetch_client = $rs_id->fetch_array();
		$id = $fetch_client['id_client'];

		$query2 = "SELECT count(*) as cnt FROM `rezervare` WHERE `check_in` BETWEEN '$check_in' AND '$check_out' 
		AND `check_out` BETWEEN '$check_in' AND '$check_out' AND `id_subt_camera` = '$_GET[id_subt_camera]' ";
		$rs2 =  $con->query($query2) or die("Last error: {$con->error}\n");
		$fetch = $rs2->fetch_array();

		if($fetch['cnt'] == 0){
			$id_subt_camera = $_GET['id_subt_camera'];
			
			$con->query("INSERT INTO `rezervare`(id_client, id_subt_camera, adulti, copii, check_in, check_out, stadiu) 
				VALUES('$id.$id_subt_camera', '$id_subt_camera', '$adulti', '$copii', '$check_in', '$check_out', '$stadiu')") 
				or die("Last error: {$con->error}\n");
			echo "<script type='text/javascript'> alert('Rezervarea s-a făcut cu succes!')</script>";

		}else {
			echo "<script>alert('Ne pare rău!Camera este indisponibilă în perioada selectată!')</script>";
			$delete ="delete from `clienti` where id_client = '$id'";
			mysqli_query($con,$delete);
			}
	}					
?>

<!DOCTYPE html>
<head>
<title>Rezervare Cameră</title>
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

body{
	background: url("./img/bod.jpg");
	background-size: cover;

}

/*-----------*/


div h1{
	margin-top:60px;
	font-family: noto;
	text-align:center;
}

.row {		
margin: 50px 10px 10px 10px;

}


.imagine{
	width:300px;
	height:220px;
	float:left;
}

.user h1{
	margin-top:100px;
	color: white ;
	text-align:left;
}

a{
color: white;
}

 div h2{
margin-top:50px;
margin-bottom:35px;
}

.panel-primary>.panel-heading{
background-color:#557f64;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
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


<!------------------- Bara de navigare ----------------------->

<nav class="navbar-inverse navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

      	</ul>
      	<ul class="nav navbar-nav navbar-right">
        	<li><a href="index.php">Acasa</a></li>
        	<li><a href="Poiana.php">Hoteluri Brasov</a></li>
		<li><a href="autentificare.php">Autentificare</a></li>
        	<li><a href="#">Inregistrare</a></li>
        	
        	</li>
        </ul>
   
</nav>	


<div class="container text-center">

 	<div class="row">
        <div class="col-md-12">
            <h1 class="page-header">ADAUGĂ O REZERVARE</h1>
        </div>
    </div> 
    <div class="col-sm-6 col-sm-offset-3">
    	<div class="panel panel-primary">
        <div class="panel-heading">INFORMATII PERSONALE 
        </div> 
                            
  <?php
if (isset($_GET['id_subt_camera'])){
include("connect.php");

$id_subt_camera = $_GET['id_subt_camera'];
$camere = "SELECT * FROM subtip_camera WHERE id_subt_camera = $id_subt_camera" ;
mysqli_query($con,$camere);
}
						?>

        <div class="panel-body">
			<form name="form" method="post">
                <div class="form-group">
                    <label>Nume</label>
                    <input name="nume" class="form-control" required >

                </div>
				<div class="form-group">
                    <label>Prenume</label>
                    <input name="prenume" class="form-control" required>         
                </div>			

				<div class="form-group">
					<label>Adulti</label> 
                    <select name="adulti" class="form-control" required>
						<option value selected ></option>
                        <option value="1 adult">1 adult</option>
                        <option value="2 adulti">2 adulti</option>
						<option value="3 adulti">3 adulti</option>
						<option value="4 adulti">4 adulti</option>
                    </select>
				</div>
		
				<div class="form-group">
					<label>Copii</label> 
                    <select name="copii" class="form-control" required>
						<option value selected ></option>
                       	<option value="fara copii">fara copii</option>
                        <option value="1 copil">1 copil</option>
						<option value="2 copii">2 copii</option>
						<option value="3 copii">3 copii</option>
						<option value="4 copii">4 copii</option>
                    </select>
				</div>
                  
                                        
                            
				<div class="form-group">
                    <label>Check-In</label>
                    <input name="check_in" type ="date" class="form-control">            
                </div>

				<div class="form-group">
                    <label>Check-Out</label>
                    <input name="check_out" type ="date" class="form-control">              
                </div>
	  
				<div class="form-group">
				<!-- <button class="btn btn-success"><a href = disponibile.php> Camere Disponibile</a></button> -->
					<button type="submit" name="submit" class="btn btn-success">ADAUGĂ</button>
                        	            
                </div>
			</form>	             
    </div>
</div>
 
           
</body>
</html> 