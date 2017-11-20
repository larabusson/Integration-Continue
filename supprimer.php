<?php
session_start();
$contenu = json_decode(file_get_contents("list_conf.json"));
if ($contenu!=NULL){
  foreach($contenu as $key => $d){
     $tab[$key] = $d;
  }
}

 unset($tab[$_GET['id']]);
 $contenu = json_encode($tab);
 $fichier = fopen("list_conf.json", 'w+');
 fwrite($fichier, $contenu);

 // Fermeture du fichier
 fclose($fichier);
 header('Location: ./home.php');

 ?>
