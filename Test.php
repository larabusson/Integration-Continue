<?php
require_once("./functions/function.php");
class TestCalc extends  PHPUnit_Framework_TestCase {

  public function setup(){
    echo "Debut du test";
  }


  public function Conf(){
      $c=new Conference();
      $c->title = "Conference 1";
      $this->assertTrue(strcmp($c->title, "Conference 1"), "OK");
  }



}




?>
