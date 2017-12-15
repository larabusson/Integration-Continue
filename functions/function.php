<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

Class Conference{
public $title;
public $location;
public $author;
public $description="";
public $time;
public $date;
}


function AjoutConference($d, $chemin){
  $tableau_conf = array();
  $c = creerConference($d);
  $tableau_conf=tableau_confleau_Conf($chemin);
  $NombreConf = count($tableau_conf);
  $key= creer_clef($d, $NombreConf);
  $tableau_conf[$key] = $c ;
  ksort($tableau_conf);
  $contenu = json_encode($tableau_conf);
  $fichier = fopen($chemin, 'w+');

  // Ecriture dans le fichier
  fwrite($fichier, $contenu);

  // Fermeture du fichier
  fclose($fichier);
}

function creer_clef($d, $NombreConf){
  $key = substr($d['date'], 0, 4).substr($d['date'], 5, 2).substr($d['date'], 8, 2).substr($d['time'], 0, 2).substr($d['time'], 3, 2).str_pad($NombreConf, 3, '0', STR_PAD_LEFT);
  return  $key;
}

function tableau_confleau_Conf($chemin){
  $contenu = json_decode(file_get_contents($chemin));
  if ($contenu!=NULL){
    foreach($contenu as $key => $d){
       $tableau_conf[$key] = $d;
    }
  }
  return $tableau_conf ;
}


function creerConference($a){
  $c = new Conference();
  $c->title=$a['title'];
  $c->location = $a['location'];
  $c->date = $a['date'];
  $c->time = $a['time'];
  $c->description = $a['description'];
  $c->author = $a['author'];
  return $c ;
}

function supprimer($i){
  $contenu = json_decode(file_get_contents("../texte/list_conf.json"));
  if ($contenu!=NULL){
    foreach($contenu as $key => $d){
       $tableau_conf[$key] = $d;
    }
  }

   unset($tableau_conf[$i]);
   $contenu = json_encode($tableau_conf);
   $fichier = fopen("../texte/list_conf.json", 'w+');
   fwrite($fichier, $contenu);

   // Fermeture du fichier
   fclose($fichier);
}

 ?>
