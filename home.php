<?php
  session_start();
  $Connecte = false ;
  if (!empty($_SESSION['login']) && !empty($_SESSION['pass'])){
    $Connecte = true;
  }
  else header('Location : deconnexion.php');
	$file_precontent=file_get_contents("list_conf.json");
	$file_content=json_decode($file_precontent,true);
<<<<<<< HEAD
	$arr = array("un", "deux", "trois");
	$i= sizeof($file_content);
	foreach ($file_content as $v){ echo $v['title'];}
	var_dump($file_content);

=======
>>>>>>> 753bd27c75b54682ae4ba3312c799ef5d84b4a09
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
              <h1>ZZagenda</h1>
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
                                <th>Location</th>
                                <th>Description</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if($file_content):
							$i=0;
							foreach ($file_content as $v){ ?>
                              <tr>
                                <td><?php echo $v['time']; ?></td>
                                <td><?php echo $v['author']; ?></td>
                                <td><?php echo $v['title']; ?></td>
                                <td><?php echo $v['location']; ?></td>
                                <td><?php echo $v['description']; ?></td>
<<<<<<< HEAD
                              </tr>
                              <?php $i++; } ?>
=======
                              </tr> 
                              <?php $i++; } ?>                                                 
>>>>>>> 753bd27c75b54682ae4ba3312c799ef5d84b4a09
                          <?php else: echo "Pas de fichier json en entrée"; ?>
                          <?php endif; ?>
                          </tbody>
                    </table>
              </div>



        <footer class="container-fluid text-center">
          <div class="row">
            <div class="col-md-4">
              <a href="./Administration.html"><button type="button" class="btn btn-link">Administrateur</button></a>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-link">Ajout Conference</button>
            </div>
            <div class="col-md-4">
              <a href="./deconnexion.php"><button type="button" class="btn btn-link">Log out
              </button></a>
            </div>
        </footer>

        </body>
        </html>
      }
