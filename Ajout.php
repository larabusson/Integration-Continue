<?php
 if(isset($_POST) && $_SESSION['admin']=='2' &&!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['location']) && !empty($_POST['description'])){
   $array = array(
     'title'=>$_POST['title'],
     'author'=>$_POST['author'],
     'date'=>$_POST['date'],
     'time'=>$_POST['time'],
     'location'=>$_POST['location'],
     'description'=>$_POST['description']
   );
   $contenu_json =json_encode($array);

    // Nom du fichier à créer
    $nom_du_fichier = 'list_conf.json';

    // Ouverture du fichier
    $fichier = fopen($nom_du_fichier, 'a+');

    // Ecriture dans le fichier
    fwrite($fichier, $contenu_json);

    // Fermeture du fichier
    fclose($fichier);


 }
else echo 'toutes les cases ne sont pas remplies correctement' ;

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
  <link href="css/ajout.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="images/logoISIMA.png" alt="logoISIMA">
    </div>
    <div class="col-md-8">
      <a href="home.php"><h1>ZZagenda</h1></a>
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


  <div class="container">
    <h2>Add an event</h2>
    <form role="form" action="./Ajout.php" method="post" class="Ajout-form">
      <div class="col-md-5">

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">TITLE</label>
        <div class="col-10">
          <input class="form-control monstyle" name="title" type="text" value="" id="example-text-input">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">AUTHOR</label>
        <div class="col-10">
          <input class="form-control monstyle" type="text" name="author" value="" id="example-text-input">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">LOCATION</label>
        <div class="col-10">
          <input class="form-control monstyle" type="text" name="location" value="" id="example-text-input">
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">DATE</label>
        <div class="col-10">
          <input class="form-control monstyle" type="date" name="date" value="2011-08-19" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">
          <label for="example-time-input" class="col-2 col-form-label">TIME</label>
          <div class="col-10">
            <input class="form-control monstyle" type="time" name="time" value="13:45:00" id="example-time-input">
          </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Description</label>
        <div class="col-10">
          <input class="form-control monstyle descr" type="text" name="description" value="" id="example-text-input">
        </div>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-group row">
        <button type="submit" class="btn btn-primary"> + ADD Event</button>
      </div>
    </div>
  </form>
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
      <a href="./login.html"><button type="button" class="btn btn-link">Sign in
      </button></a>
    </div>
</footer>

</body>
</html>
