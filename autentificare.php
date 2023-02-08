<?php
  include("connect.php");

  $error="";
  session_start();

  if(isset($_POST['submit'])) { 
   	$count=0;
   	$data=mysqli_query($con,"select * from admin where username='$_POST[username]' && parola='$_POST[parola]'");
   	$count=mysqli_num_rows($data);
   	$row = mysqli_fetch_array($data);
   
    if($count==0) {
      $error= "Nume utilizator sau parolă invalidă!";
    }
    else {
      header("Location:lista_rezervari.php");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Pagina de Autentificare</title>
    <link rel="stylesheet" type="text/css" href="stil.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <body class="body">
    <div class="container">
      <div class="col-lg-8">
        <div class="login">
          <h1>Autentificare Admin</h1>
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Username" name="username"> 
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Parola" name="parola">
            </div>
            <div class="inregistrare">
              <label class="inregistrarec"><a href="inregistrarec.php">Daca nu ai cont inregistreaza-te aici!<a></label>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Sign in</button>
          </form>
        </div>
      </div> 
    </div>  
  </body>
</html> 
