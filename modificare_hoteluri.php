<?php require_once 'connect.php';
  
  if(isset($_POST['submit'])){
    $nume_hotel = $_POST['nume_hotel'];
    $poza_hotel = $_POST['poza_hotel'];
    $descriere = $_POST['descriere'];
    $id_hotel = $_GET['id_hotel'];
    $admin = "UPDATE `hotel` SET `nume_hotel`='$nume_hotel',`poza_hotel`='$poza_hotel', `descriere`='$descriere' WHERE id_hotel='$id_hotel'";
    
    if (mysqli_query($con,$admin)){
      echo "<script type='text/javascript'> alert('Hotelul s-a modificat!')</script>";
          echo "<script type='text/javascript'> window.location='lista_rezervari.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Hotelul nu s-a putut modifica!')</script>";                 
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifica Hotel</title>
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

    <nav class="navbar-inverse navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="lista_rezervari.php">Rezervari</a></li>
          <li><a href="modifica_hoteluri.php">Modifică Hoteluri</a></li>
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div>   
    </nav>  

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">Modifica hotelul</h2>
        </div>
      </div> 
      <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Nume Hotel" name="nume_hotel">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Descriere" name="descriere">
            </div>    
            <div class = "preview">
              <center id = "poza_hotel">[Photo]</center>
            </div>
            <input type = "file"  id = "photo" name = "poza_hotel" />                
            <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Modifica Hotel</button> <br><br>
          </form>
        </div>
      </div>
    </div>

    <script src = "../js/js/jquery.js"></script>
    <script src = "../js/bootstrap.js"></script>
    <script type = "text/javascript">
      $(document).ready(function(){
        $pic = $('<img id = "image" width = "100%" height = "100%"/>');
        $poza_hotel = $('<center id = "poza_hotel">[Photo]</center>');
        $("#photo").change(function(){
          $("#poza_hotel").remove();
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