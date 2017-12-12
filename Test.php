<?php

class TestCalc extends  PHPUnit_Framework_TestCase {

  public function setup(){
    echo "Debut du test";
  }


  public function essai(){
  //  $this->assertTrue(1==1, "Test reussi");
  }


  public function testMul(){
    $a = 2 ;
    $b = 3;

    $c = 6;

    $this->assertTrue($c==6, "Test reussi");
  }

  public function testDiv(){
    $a = 4 ;
    $b = 2;
    $d = 0 ;

    $c = 2;

    $this->assertTrue($c==2, "Test reussi");

  }

  public function tearDown(){
    echo"fin du test";
  }

}




 ?>
