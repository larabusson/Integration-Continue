<?php

Class Conference{
public $title;
public $location;
public $author;
public $description="";
public $time;
public $date;
}


/*Add a conference, $d : information in the inputs , $chemin : the path to find the file of conferences*/

function AjoutConference($d, $chemin){
  $tab = array();
  $c = creerConference($d);
  $tab=Tableau_Conf($chemin);
  $NombreConf = count($tab);
  $key= creer_clef($d, $NombreConf);
  $tab[$key] = $c ;
  ksort($tab); /*Sort the conference in chronological order*/
  $contenu = json_encode($tab);
  //Write the conferences in the file*/
  $fichier = fopen($chemin, 'w+');
  fwrite($fichier, $contenu);
  fclose($fichier);
  return $key;
}



/*Create a unique key for a conference*/
function creer_clef($d, $NombreConf){
  $key = substr($d['date'], 0, 4).substr($d['date'], 5, 2).substr($d['date'], 8, 2).substr($d['time'], 0, 2).substr($d['time'], 3, 2).str_pad($NombreConf, 3, '0', STR_PAD_LEFT);
  return  $key;
}



/*Read the file of conferences and Create an array of conference */
function Tableau_Conf($chemin){
  $tab= array();
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

function supprimer($i, $chemin){
  $bool = false; /*check if the removal worked*/
  $tab = Tableau_Conf($chemin);
   if (array_key_exists($i, $tab)){ /*Check if conference to remove exist*/
     unset($tab[$i]);   /*Remove the conference*/
     $bool = true;
   }
   $contenu = json_encode($tab);
   $fichier = fopen($chemin, 'w+');
   fwrite($fichier, $contenu);

   fclose($fichier);
   return $bool;
}

 ?>
