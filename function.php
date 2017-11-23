<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

Class Conference{
public $title;
public $location;
public $author;
public $description="";
public $time;
public $date;
}


function AjoutConference(){
  extract($_POST);
  $tab = array();
  $c = creerConference();
  $contenu = json_decode(file_get_contents("list_conf.json"));
  if ($contenu!=NULL){
    foreach($contenu as $key => $d){
       $tab[$key] = $d;
    }
  }
  $NombreConf = count($tab);
  $key = substr($date, 0, 4).substr($date, 5, 2).substr($date, 8, 2).substr($time, 0, 2).substr($time, 3, 2).str_pad($NombreConf, 3, '0', STR_PAD_LEFT);
  $tab[$key] = $c ;
  ksort($tab);
  $contenu = json_encode($tab);
  $fichier = fopen("list_conf.json", 'w+');
  // Ecriture dans le fichier
  fwrite($fichier, $contenu);

  // Fermeture du fichier
  fclose($fichier);
}


function creerConference(){
  extract($_POST);
  $c = new Conference();
  $c->title=$title;
  $c->location = $location;
  $c->date = $date;
  $c->time = $time;
  $c->description = $description;
  $c->author = $author;
  return $c ;
}


 ?>
