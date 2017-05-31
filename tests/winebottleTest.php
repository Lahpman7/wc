<?php
use PHPUnit\Framework\TestCase;
//include_once("lib/wineBottle.php");
include_once("../lib/wineBottle.php");


class BottleTest extends TestCase
{
   public function testInsert(){
        $bottleObject = new RegBottle();

        $tester = $bottleObject::insertBottle("AAATestProducer","TestWineName","1970", "WineStyleTest",
        "grapesTest","countryTest", "cityTest45", "stateTest","regionTestCheck",89);

        $this->assertEquals($tester,true);
    }

    public function testUpdateGrapes(){
        $bottleObject = new RegBottle();
        $tester = $bottleObject::updateBottleGrapes("AAATestProducer","TestWineName","UpdatedGrapeName");
        $this->assertTrue($tester);
    }
    public function testDelete(){
        $bottleObject = new RegBottle();
        $tester = $bottleObject::deleteBottle("TestProducer");
        $this->assertTrue($tester);
    }
    public function testRetrieveOne(){
        $bottleObject = new RegBottle();

        $tester = $bottleObject::retrieveBottle("Watervale");

        $this->assertEquals($tester,"Watervale");
    }
    public function testRetrieveAll(){
        $bottleObject = new RegBottle();
        $tester = $bottleObject::retrieveAll();
        $this->assertTrue(true);
    }
}
?>
