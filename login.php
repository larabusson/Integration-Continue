<?php
    session_start();
    $bool = 1;
    $file = @fopen("./login.txt", "r+");
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
      extract($_POST);
      if($file){
        while(!feof($file) && $bool==1){
            $ligne=fgets($file);
            $logth=strtok($ligne, ';');
            $passth=strtok(';');
            if($logth==$login && $passth==$pass){
              $_SESSION['login'] = $_POST['login'];
              $_SESSION['pass'] = $_POST['pass'];
              $bool=0;
              header('Location: home.php');
              exit();
            }
        }
        if($bool!=0){
          echo "Vous devez saisir des identifiants valides";
        }
      }
      else {
        echo "il y a un probleme";
      }
    }
    fclose($file);
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agenda ZZ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/home.css" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/form-elements.css">
  <link rel="stylesheet" href="assets/css/style.css">


  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="images/logoISIMA.png" alt="logoISIMA">
    </div>
    <div class="col-md-8">
        <a href="home.php"><h1>ZZagenda</h1></a>    </div>
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
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
      <div class="form-top">
        <div class="form-top-left">
          <h3>Login to our site</h3>
            <p>Enter your username and password to log on:</p>
        </div>
        <div class="form-top-right">
          <i class="fa fa-lock"></i>
        </div>
        </div>
        <div class="form-bottom">
      <form role="form" action="./login.php" method="post" class="login-form">
        <div class="form-group">
          <label class="sr-only" for="form-username">Username</label>
            <input type="login" name="login" placeholder="Username..." class="form-username form-control" id="form-username">
          </div>
          <div class="form-group">
            <label class="sr-only" for="form-password">Password</label>
            <input type="pass" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
          </div>
          <button type="submit" class="btn btn1">Sign in!</button>
      </form>

    </div>
    </div>
</div>



<footer class="container-fluid text-center">
  <div class="row">
    <div class="col-md-4">
      <button type="button" class="btn btn2 btn-link">Administrateur</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn2 btn-link">Ajout Conference</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="btn btn2 btn-link">Sign in</button>
    </div>
</footer>

</body>
</html>
