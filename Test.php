<?php
require_once("./functions/function.php");
class MesTests extends  PHPUnit_Framework_TestCase {

  public function setup(){
    echo "Debut du test";
  }


  public function testConf(){
      $c=new Conference();
      $c->title = "Conference 1";
      $this->assertTrue(strcmp($c->title, "Conference 1")==0, "OK");
  }

  public function test_Lecture_Fichier(){
      $tab = Tableau_Conf("../texte/Conf_test.json");
      $NB = count($tab);
      $this->assertTrue(3==$NB, "OK");    
  }





}




?>
