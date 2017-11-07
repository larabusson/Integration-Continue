<?php
  session_start();
  $Connecte = false ;
  if (!empty($_SESSION['login']) && !empty($_SESSION['pass'])){
    $Connecte = true;
  }
	$file_precontent=file_get_contents("list_conf.json");
	$file_content=json_decode($file_precontent,true);
	$arr = array("un", "deux", "trois");
	var_dump($file_content);
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <title>Bootstrap Example</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="css/home.css" rel="stylesheet">
        </head>
        <body>

        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <img src="images/logoISIMA.png" alt="logoISIMA">
            </div>
            <div class="col-md-8">
              <a href="home.html"><h1>ZZagenda</h1></a>
            </div>
            <div class="col-md-2">
              <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Langues
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="#" title="Lien 1">Francais</a></li>
                  <li><a href="#" title="Lien 2">English</a></li
                  </ul>
              </div>
            </div>
          </div>

        </div>
              <div class="container">
                    <?php
                    if ($Connecte) {
                      echo "<h2>Bonjour " . $_SESSION['login'] . "</h2>";
                    }
                    ?>
                    <h2> days </h2>
                    <table class="table table-striped">
                          <thead>
                              <tr>
                                <th>Time <i class="fa fa-clock-o" aria-hidden="true"></i></th>
                                <th>Who</th>
                                <th>Subject</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php if($file_content):
							$i=0;
							while($i < sizeof($file_content['Confs'])){ ?>
                              <tr>
                                <td><?php echo $file_content['Confs'][$i]['Time']; ?></td>
                                <td><?php echo $file_content['Confs'][$i]['Author']; ?></td>
                                <td><?php echo $file_content['Confs'][$i]['Title']; ?></td>
                              </tr> 
                              <?php $i++; } ?>                                                 
                          <?php else: echo "nique ta mère"; ?>
                          <?php endif; ?>
                          </tbody>
                    </table>
              </div>



        <footer class="container-fluid text-center">
          <div class="row">
            <div class="col-md-4">
              <a href="./Administration.php"><button type="button" class="btn btn-link">Administrateur</button></a>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-link">Ajout Conference</button>
            </div>
            <div class="col-md-4">
              <a href="./login.php"><button type="button" class="btn btn-link">Sign in
              </button></a>
            </div>
        </footer>

        </body>
        </html>
      }
