<?php require_once 'connect.php';
  
  if(isset($_POST['submit'])){
    $subtip = $_POST['subtip'];
    $admin = "INSERT INTO `subtip_camera`(`id_camera`,`subtip`, `poza` ) VALUES ('$_GET[id_camera]','$_POST[subtip]','$_POST[poza]')";
    
    if (mysqli_query($con,$admin)){
      echo "<script type='text/javascript'> alert('Subtipul de camera s-a adaugat in baza de date!')</script>";
          echo "<script type='text/javascript'> window.location='lista_rezervari.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Subtipul de camera nu s-a putut adauga!')</script>";                 
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Adaugă Subtip Camera</title>
    <link rel="stylesheet" type="text/css" href="stil.css">
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  
  <body class="body">

    <!------- Antetul paginii ----------->

    <section class ="header">
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
          <li><a href="adauga_subcamera.php">Adauga Subtip Cameră</a></li>
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div>
    </nav>  

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">Adaugă o facilitate de cameră nou</h2>
        </div>
      </div> 
      <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Nume Facilitate Camera" name="subtip">
            </div> <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Adaugă Facilitate</button> <br><br>
          </form>
        </div> 
      </div>
    </div>
  </body>
</html> 