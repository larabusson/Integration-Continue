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
      $c = 6;

      $this->assertTrue($c==6, "Test reussi");
  }



}




?>
