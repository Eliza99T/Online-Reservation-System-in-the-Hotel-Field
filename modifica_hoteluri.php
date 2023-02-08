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
                <th class="th">Id Hotel</th>
                <th class="th">Nume Statiune</th>
                <th class="th">Nume Hotel</th>
              </tr>
            </thead>
            <tbody>

              <?php
                include("connect.php");
                $query = $con->query( "SELECT * FROM `statiune`, hotel WHERE statiune.id_statiune=hotel.id_statiune ORDER BY hotel.id_hotel ASC");
                {
                  while ($num = $query->fetch_array(MYSQLI_ASSOC)) { 
                    echo"<tr>
                      <th>".$num['id_hotel']."</th>
                      <th>".$num['nume_statiune']."</th>
                      <th>".$num['nume_hotel']."</th>
                      <th><a href = 'modificare_hoteluri.php?id_hotel=".$num['id_hotel']." ' class = 'btn btn-success'>Modifica Hotel</a><th>
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