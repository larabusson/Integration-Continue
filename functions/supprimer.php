<?php

  $contenu = json_decode(file_get_contents("../texte/list_conf.json"));
  if ($contenu!=NULL){
    foreach($contenu as $key => $d){
       $tab[$key] = $d;
    }
  }

   unset($tab[$_GET['id']]);
   $contenu = json_encode($tab);
   $fichier = fopen("../texte/list_conf.json", 'w+');
   fwrite($fichier, $contenu);

   // Fermeture du fichier
   fclose($fichier);
   header('Location: ../pages/home.php');

 ?>
