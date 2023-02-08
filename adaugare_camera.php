<?php require_once 'connect.php';
  
  if(isset($_POST['submit'])){
    $tip = $_POST['tip'];
    $pret_camera = $_POST['pret_camera'];
    $poza_camere = $_POST['poza_camere'];
    $rezervare = "INSERT INTO `tip_camera`(`tip`) VALUES ('$_POST[tip]')";
    mysqli_query($con,$rezervare);
    $id_tip = "Select max(id_tip_camera) as id_tip_camera from tip_camera";
    $rs_id = mysqli_query($con,$id_tip);

    $fetch_camera = $rs_id->fetch_array();
    $id = $fetch_camera['id_tip_camera'];
    $id_hotel = $_GET['id_hotel'];
    $query2 = "SELECT * FROM camere, hotel WHERE hotel.id_hotel = '$id_hotel' ";
    $rs2 =  $con->query($query2) or die("Last error: {$con->error}\n");
    $fetch = $rs2->fetch_array();

    if (mysqli_query($con,$query2)){
      
      $con->query("INSERT INTO `camere`( id_hotel,id_tip_camera, pret_camera, poza_camere) 
        VALUES('$id_hotel','$id', '$pret_camera', '$poza_camere')") 
        or die("Last error: {$con->error}\n");
      echo "<script type='text/javascript'> alert('Camera s-a adaugat cu succes!')</script>";

    }
    else {
      echo "<script>alert('Camera nu s-a putut adauga!')</script>";
      $delete ="delete from `tip_camera` where id_tip_camera = '$id'";
      mysqli_query($con,$delete);
    }
  }         
?>


<!DOCTYPE html>
<html>

  <head>
    <title>Adaugă Camera</title>
    <link rel="stylesheet" type="text/css" href="stil.css"> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body class="body">

    <!------- Antetul paginii ----------->

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
          <li><a href="adauga_camera.php">Adaugă Cameră</a></li>
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div>
    </nav>  

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">Adaugă o cameră nouă</h2>
        </div>
      </div> 
      <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Tipul Camerei" name="tip">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="quantity" placeholder="Pret Camera" name="pret_camera" >
            </div>      
            <div class = "preview">
              <center id = "poza_camere">[Photo]</center>
            </div>
            <input type = "file" required = "required" id = "photo" name = "poza_camere" /> <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Adaugă Camera</button> <br><br>
          </form>
        </div>
      </div>
    </div>


    <script src = "../js/js/jquery.js"></script>
    <script src = "../js/bootstrap.js"></script>
    <script type = "text/javascript">
      $(document).ready(function(){
        $pic = $('<img id = "image" width = "100%" height = "100%"/>');
        $poza_camere = $('<center id = "poza_camere">[Photo]</center>');
        $("#photo").change(function(){
          $("#poza_statiune").remove();
          var files = !!this.files ? this.files : [];
          if(!files.length || !window.FileReader){
            $("#image").remove();
            $poza_statiune.appendTo("#preview");
          }
          if(/^image/.test(files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
              $pic.appendTo("#preview");
              $("#image").attr("src", this.result);
            }
          }
        });
      });
    </script>
  </body>
</html> 