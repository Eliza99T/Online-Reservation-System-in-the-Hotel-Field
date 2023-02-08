<?php include("connect.php");

  if(isset($_POST['submit'])){

    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $usermane = $_POST['username'];
    $parola = $_POST['parola'];
    $adresa = $_POST['adresa'];
    $email = $_POST['email'];
            
    $admin = "INSERT INTO `admin`(`nume`, `prenume`,`username`,`parola`,`adresa`,`email`) VALUES ('$_POST[nume]','$_POST[prenume]',
    '$_POST[username]','$_POST[parola]','$_POST[adresa]','$_POST[email]')";
    
    if (mysqli_query($con,$admin)){
      echo "<script type='text/javascript'> alert('Te-ai înregistrat cu succes!')</script>";
      echo "<script type='text/javascript'> window.location='autentificare.php'</script>";
    }
    else{ 
      echo "<script type='text/javascript'> alert('Înregistrarea nu s-a putut realiza!')</script>";                         
    }
  }
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Pagina de Înregistrare</title>
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
          <h1>Înregistrează-te aici!</h1>
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Nume" name="nume">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Prenume" name="prenume">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Parola" name="parola">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Adresa" name="adresa">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Email" name="email">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Sign Up</button>
          </form>
        </div>
      </div>   
    </div>
  </body>
</html> 
