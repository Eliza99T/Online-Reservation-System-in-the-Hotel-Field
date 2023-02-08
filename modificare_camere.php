<?php require_once 'connect.php';
  
  if(isset($_POST['submit'])){
    $pret_camera = $_POST['pret_camera'];
    $poza_camere = $_POST['poza_camere'];
    $id_camera = $_GET['id_camera'];
    $admin = "UPDATE `camere` SET `pret_camera`='$pret_camera',`poza_camere`='$poza_camere' WHERE id_camera='$id_camera'";
    
    if (mysqli_query($con,$admin)){
      echo "<script type='text/javascript'> alert('Camera s-a modificat!')</script>";
          echo "<script type='text/javascript'> window.location='lista_rezervari.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Camera nu s-a putut modifica!')</script>";                 
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifica Camera</title>
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
          <li><a href="modifica_camera.php">Modifica Cameră</a></li>
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div> 
    </nav>  

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header">Modifica Camera</h2>
        </div>
      </div> 
      <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <form method="post" action="">
            <div class="form-group">
              <input type="number" class="form-control" id="quantity" placeholder="Pret Camera" name="pret_camera" >
            </div>
                       
            <div class = "preview">
              <center id = "poza_camere">[Photo]</center>
            </div>
            <input type = "file"  id = "photo" name = "poza_camere" />
            <br>
            <button type="submit" name="submit" class="btn btn-lg btn-block btn-success">Modifica Camera</button> <br><br>
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