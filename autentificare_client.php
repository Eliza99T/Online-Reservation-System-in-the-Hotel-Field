<?php
  include("connect.php");

  session_start();

  if(isset($_POST['submit'])){ 
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume']; 
   	$data="select id_client from clienti where nume='$nume' AND prenume='$prenume'";
   
    $rezultat = mysqli_query($con, $data) or die(mysql_error());
    $rand = mysqli_fetch_array($rezultat);
    if(isset($rand['id_client']) && $rand['id_client'] > 0){

    $_SESSION['nume'] = $nume;
    header("Location:rezervari.php?id_client=" . $rand['id_client']);

    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Pagina de Autentificare Client</title>
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
          <h1>Autentificare Client</h1>
            <form method="post" action="">
              <div class="form-group">
                <input type="text" class="form-control"  placeholder="Nume" name="nume">
              </div>
              <div class="form-group">
                <input type="text" class="form-control"  placeholder="Prenume" name="prenume">
              </div>
              <br>
              <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Sign in</button>
            </form>
          </div>
        </div>
    </div>
  </body>
</html> 
