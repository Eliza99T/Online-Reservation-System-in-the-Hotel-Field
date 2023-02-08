<!DOCTYPE html>
<html>
  <head>
    <title>Pagina de admin</title>
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
          <li><a href="index.php">Deconectare</a></li>
        </ul>
      </div> 
    </nav>

    <div class="container">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th class="th">Id Subtip</th>
                <th class="th">Nume Hotel</th>
                <th class="th">Tip Camera</th>
              </tr>
            </thead>
            <tbody>

              <?php
                include("connect.php");
                $query = $con->query( "SELECT * FROM `camere`, tip_camera,hotel, subtip_camera WHERE hotel.id_hotel=camere.id_hotel AND tip_camera.id_tip_camera=camere.id_tip_camera AND camere.id_camera=subtip_camera.id_camera ORDER BY subtip_camera.id_subt_camera ASC");
                {
                  while ($num = $query->fetch_array(MYSQLI_ASSOC)) { 
                    echo"<tr>
                      <th>".$num['id_subt_camera']."</th>
                      <th> ".$num['nume_hotel']."</th>
                      <th>".$num['tip']."</th>
                      <th><a href = 'modificare_subcamera.php?id_subt_camera=".$num['id_subt_camera']." ' class = 'btn btn-success'>Modifica Subtip Camera</a><th>
                    </tr>";    
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>