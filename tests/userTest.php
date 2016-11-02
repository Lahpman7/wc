<?PHP
use PHPUnit\Framework\TestCase;
//include_once("../lib/user.php");
include "lib/user.php";
class UserTest extends TestCase
{
    public function testUser(){
        $newUser = new RegUser();
        $tester = $newUser::isUser("Testy2");
        //assertEquals(-1, $b->getAmount());
        $this->assertEquals($tester,false);
    }
    
    public function testDeleteUser(){
        $newUser = new RegUser();
        $tester = $newUser::deleteUser("asdf");
        $this->assertTrue($tester);
    }
}
?>