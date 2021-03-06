<?php
    session_start();
    $bool = 1;
    $file = @fopen("../texte/login.txt", "r+"); /*open the file of login*/
    include('../functions/language.php');
    if(isset($_GET['language'])){ /*Check the language*/
      $language=$_GET['language'];
    }
    else{
      $language = 'en';
    }
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {  /*Check the inputs*/
      extract($_POST);
      $crypted_pass=hash("md5",$_POST['pass']);  /*Hash the password*/
      if($file){
        while(!feof($file) && $bool==1){
          /*Read the file*/
            $ligne=fgets($file);
            $logth=strtok($ligne, ';');
            $passth=strtok(';');
            $admin=strtok(';');
          /*Check the password*/
            if($logth==$login && $crypted_pass==$passth){
              $_SESSION['login'] = $_POST['login'];
              $_SESSION['pass'] = $_POST['pass'];
              $_SESSION['admin']= $admin=='2';
              $bool=0;
              setcookie('login', $_POST['login'], time()+3600*24*31); /*Initialiaze the cookies*/
              header('Location: ./home.php');
              exit();
            }
        }
        if($bool!=0){
          echo "<script type='text/javascript'> alert('{$langue['login']['idValid'][$language]}'); </script>";
        }
      }
      else {
        echo "<script type='text/javascript'> alert('{$langue['login']['file'][$language]}'); </script>";
      }
    }
    fclose($file);
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ZZagenda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="../css/home.css" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/form-elements.css">
  <link rel="stylesheet" href="../assets/css/style.css">


  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="../assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="../images/logoISIMA.png" alt="logoISIMA">
    </div>
    <div class="col-md-8">
        <h1>ZZagenda</h1>   </div>
    <div class="col-md-2">
      <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Langues
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="./login.php?language=fr" title="Lien 1">Francais</a></li>
            <li><a href="./login.php?language=en" title="Lien 2">English</a></li
          </ul>
      </div>
    </div>
  </div>

</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
      <div class="form-top">
        <div class="form-top-left">
          <?php echo  "<h3>". $langue['signup']['msgAccueil'][$language] . "</h3>" ;?>
            <p><?php echo $langue['signup']['msgAccueil2'][$language]; ?></p>
        </div>
        <div class="form-top-right">
          <i class="fa fa-lock"></i>
        </div>
        </div>
        <div class="form-bottom">
      <form role="form" action="./login.php" method="post" class="login-form">
        <div class="form-group">
          <label class="sr-only" for="form-username">Username</label>
            <input type="login" name="login" placeholder=<?php echo $langue['signup']['username'][$language]; ?> class="form-username form-control" id="form-username" value=<?php echo !empty($_COOKIE['login']) ? $_COOKIE['login'] : "" ?> >
          </div>
          <div class="form-group">
            <label class="sr-only" for="form-password">Password</label>
            <input type="password" name="pass" placeholder="<?php echo $langue['signup']['password'][$language]; ?>" class="form-password form-control" id="form-password">
          </div>
          <button type="submit" class="btn btn1"><?php echo $langue['signup']['submit'][$language]; ?></button>
      </form>

    </div>
    </div>
</div>



<footer class="container-fluid text-center">

</footer>

</body>
</html>
