<?php require_once 'connect.php';
  
  if(isset($_POST['submit'])){
    $nume_statiune = $_POST['nume_statiune'];
    $regiune = $_POST['regiune'];
    $relief = $_POST['relief'];
    $poza_statiune = $_POST['poza_statiune'];
    $id_statiune = $_GET['id_statiune'];
    $admin = "UPDATE `statiune` SET `nume_statiune`='$nume_statiune', `regiune`='$regiune',`relief`='$relief',`poza_statiune`='$poza_statiune' WHERE id_statiune='$id_statiune'";
    
    if (mysqli_query($con,$admin)){
      echo "<script type='text/javascript'> alert('Staţiunea s-a modificat!')</script>";
          echo "<script type='text/javascript'> window.location='lista_rezervari.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Staţiunea nu s-a putut modifica!')</script>";                 
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifica Staţiune</title>
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
          <li><a href="modifica_statiune.php">Modifică Staţiune</a></li>
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div> 
    </nav>  

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">Modifică Staţiune</h2>
        </div>
      </div> 
      <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Nume Staţiune" name="nume_statiune">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="regiune" name="regiune">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="relief" name="relief">
            </div>      
            <div class = "preview">
              <center id = "poza_statiune">[Photo]</center>
            </div>
            <input type = "file"  id = "photo" name = "poza_statiune" />
            <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Adaugă Hotel</button> <br><br>
          </form>
        </div>
      </div>
    </div>

    <script src = "../js/js/jquery.js"></script>
    <script src = "../js/bootstrap.js"></script>
    <script type = "text/javascript">
      $(document).ready(function(){
        $pic = $('<img id = "image" width = "100%" height = "100%"/>');
        $poza_statiune = $('<center id = "poza_statiune">[Photo]</center>');
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