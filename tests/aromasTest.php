<?PHP
use PHPUnit\Framework\TestCase;
include "lib/aromas.php";

class AromasTest extends TestCase
{
    public function testWhiteOakVanillaToastSmokeCoconutAromaList(){
    $tester = true;
    $newAroma = new Aromas();
    $aromas_from_db = $newAroma::getAromas(1,'oak_vanilla_toast_smoke_coconut');
    $aromas_list = array("Vanilla ", 
                    "Maple", 
                    "Light Toast",
                    "Heavy Toast",
                    "Sawdust");

    foreach( $aromas_from_db as $key => $aroma)
    {
        if ($aroma['oak_vanilla_toast_smoke_coconut'] != $aromas_list[$key]){
            $tester = false;
        }
    } 
    $this->assertTrue($tester);
    }

    public function testRedOakVanillaToastSmokeCoconutAromaList(){
    $tester = true;
    $newAroma = new Aromas();
    $aromas_from_db = $newAroma::getAromas(0,'oak_vanilla_toast_smoke_coconut');
    $aromas_list = array("Vanilla", 
                    "Maple", 
                    "Light Toast",
                    "Heavy Toast",
                    "Sawdust",
                    "Sandlewood",
                    "Pencil Shavings");

    foreach( $aromas_from_db as $key => $aroma)
    {
        if ($aroma['oak_vanilla_toast_smoke_coconut'] != $aromas_list[$key]){
            $tester = false;
        }
    } 
    $this->assertTrue($tester);
    }

}
?>