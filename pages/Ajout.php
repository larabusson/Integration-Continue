<?php
session_start();
if (empty($_SESSION['login']) || empty($_SESSION['pass'])){
	header('Location: ./login.php');
}
else{
require_once('../functions/function.php');
}
include('../functions/language.php');
if(isset($_GET['language'])){
	$language=$_GET['language'];
}
else{
	$language = 'en';
}
/*if($_SESSION['redirection']){
	$_SESSION['redirection'] = 0;
	echo"coucou";
	header('Location: ./home.php');
}*/
$id=$_GET['id'];
$contenu=0;
if ($id) {
		$file_precontent=file_get_contents("../texte/list_conf.json");
		$contenu=json_decode($file_precontent,true);
		$contenuT=$contenu[$id];

}

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
  <link href="../css/ajout.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="../images/logoISIMA.png" alt="logoISIMA">
    </div>
    <div class="col-md-8">
      <a href="./home.php"><h1>ZZagenda</h1></a>
    </div>
    <div class="col-md-2">
      <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Langues
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="./Ajout.php?language=fr" title="Lien 1">Francais</a></li>
          <li><a href="./Ajout.php?language=en" title="Lien 2">English</a></li
          </ul>
      </div>
    </div>
  </div>


  <div class="container">
    <h2>Add an event</h2>
    <form role="form" action="./Ajout.php" method="post" class="Ajout-form">
      <div class="col-md-5">

      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label"><?php echo $langue['home']['title'][$language]; ?></label>
        <div class="col-10">
          <input class="form-control monstyle" name="title" type="text" value="<?php if ($id)  echo $contenuT['title']; ?>" id="example-text-input">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label"><?php echo $langue['home']['who'][$language]; ?></label>
        <div class="col-10">
          <input class="form-control monstyle" type="text" name="author" value="<?php if ($id)  echo $contenuT['author']; ?>" id="example-text-input">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label"><?php echo $langue['home']['location'][$language]; ?></label>
        <div class="col-10">
          <input class="form-control monstyle" type="text" name="location" value="<?php if ($id)  echo $contenuT['location']; ?>" id="example-text-input">
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label"><?php echo $langue['home']['date'][$language]; ?></label>
        <div class="col-10">
          <input class="form-control monstyle" type="date" name="date" value="<?php if ($id)  echo $contenuT['date']; ?>" id="example-date-input">
        </div>
      </div>
      <div class="form-group row">
          <label for="example-time-input" class="col-2 col-form-label"><?php echo $langue['home']['time'][$language]; ?> </label>
          <div class="col-10">
            <input class="form-control monstyle" type="time" name="time" value="<?php if ($id)  echo $contenuT['time']; ?>" id="example-time-input">
          </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Description</label>
        <div class="col-10">
          <input class="form-control monstyle descr" type="text" name="description" value="<?php if ($id)  echo $contenuT['description']; ?>" id="example-text-input">
        </div>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-group row">
        <button type="submit" class="btn btn-primary"> <?php echo $langue['home']['ajoutC'][$language]; ?> </button>
      </div>
    </div>
  </form>
</div>




<footer class="container-fluid text-center">
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-link"><?php echo $langue['home']['ajoutC'][$language]; ?></button>
    </div>
    <div class="col-md-6">
      <a href="../functions/deconnexion.php"><button type="button" class="btn btn-link"><?php echo $langue['home']['logout'][$language]; ?>
      </button></a>
    </div>
</footer>
</body>
</html>


<?php
if ($contenu){
		  foreach($contenu as $key => $d){
			 $tab[$key] = $d;
		  }
		 unset($tab[$_GET['id']]);
		 $contenu = json_encode($tab);
		 $fichier = fopen("../texte/list_conf.json", 'w+');
		 fwrite($fichier, $contenu);
		 // Fermeture du fichier
		 fclose($fichier);
	 }
$today=getdate();
if(isset($_POST) &&!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['location'])){
	 if (checkdate(substr($_POST['date'], 5, 2), substr($_POST['date'], 8, 2), substr($_POST['date'], 0, 4))){
			$today=$today['mday'].'-'.$today['mon'].'-'.$today['year'];
			if(strtotime($_POST['date']) > strtotime($today)){
				$_SESSION['redirection'] = 1;
			  AjoutConference();
			}
	 else echo "Attention la date n est pas correcte";
	}
else echo "Des champs n'ont pas été remplis";
}


 ?>