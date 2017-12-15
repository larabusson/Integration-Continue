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
      $key = AjoutConference($tab, "./texte/Conf_test.json");
      $this->assertTrue(supprimer($key, "./texte/Conf_test.json")); /*Check the conference creation, conference add, conference delete and json lecture*/
  }






}




?>
