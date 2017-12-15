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
  $tab = array();
  $c = creerConference($d);
  $tab=Tableau_Conf($chemin);
  if($tab){
  $NombreConf = count($tab);
  $key= creer_clef($d, $NombreConf);
  $tab[$key] = $c ;
  ksort($tab);
  $contenu = json_encode($tab);
  $fichier = fopen($chemin, 'w+');

  // Ecriture dans le fichier
  fwrite($fichier, $contenu);

  // Fermeture du fichier
  fclose($fichier);
}
}

function creer_clef($d, $NombreConf){
  $key = substr($d['date'], 0, 4).substr($d['date'], 5, 2).substr($d['date'], 8, 2).substr($d['time'], 0, 2).substr($d['time'], 3, 2).str_pad($NombreConf, 3, '0', STR_PAD_LEFT);
  return  $key;
}

function Tableau_Conf($chemin){
  $contenu = json_decode(file_get_contents($chemin));
  if ($contenu!=NULL){
    foreach($contenu as $key => $d){
       $tab[$key] = $d;
    }
  }
  return $tab ;
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
       $tab[$key] = $d;
    }
  }

   unset($tab[$i]);
   $contenu = json_encode($tab);
   $fichier = fopen("../texte/list_conf.json", 'w+');
   fwrite($fichier, $contenu);

   // Fermeture du fichier
   fclose($fichier);
}

 ?>
