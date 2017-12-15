<?php
require_once("./functions/function.php");
class MesTests extends  PHPUnit_Framework_TestCase {

  public function setup(){
    echo "Debut du test";
  }


  public function testConf(){
      $tab['title']="test";
      $tab['location']="";
      $tab['author']="";
      $tab['date']="2050-02-03";
      $tab['time']="10-10";
      $tab['description']="";
      $c=creerConference($tab);
      $conf['title']="test";
      $conf['location']="";
      $conf['author']="";
      $conf['date']="2050-02-03";
      $conf['time']="10-10";
      $conf['description']="";
      AjoutConference($conf, "./texte/Conf_test.json");
      $this->assertTrue(strcmp($c->title, "test")==0, "OK");
      supprimer("201802020200003", "./texte/list_conf.json");
      $tab = Tableau_Conf("./texte/list_conf.json");
      $NB = count($tab);
      $this->assertTrue(3==$NB, "OK");
/*$Tableau_conf = Tableau_Conf("./texte/Conf_test.json");
      $NB = count($Tableau_conf);
      $this->assertTrue(0==$NB, "OK");
      $key = creer_clef($tab);
      echo $key;
      echo array_key_exists($key , $Tableau_conf);
      $this->assertTrue(array_key_exists($key , $Tableau_conf));*/
  }

  public function test_Lecture_Fichier(){
    /*  $tab = Tableau_Conf("./texte/Conf_test.json");
      $NB = count($tab);
      $this->assertTrue(0==$NB, "OK");*/
  }





}




?>
