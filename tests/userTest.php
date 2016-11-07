<?PHP
use PHPUnit\Framework\TestCase;
include "lib/user.php";

class UserTest extends TestCase
{
    
    public function testUser(){
        $newUser = new RegUser();
        $tester = $newUser::isUser("Testy2");
        //assertEquals(-1, $b->getAmount());
        $this->assertEquals($tester,true);
    }
    
    public function testDeleteUser(){
        $newUser = new RegUser();
        $tester = $newUser::deleteUser("asdf");
        $this->assertTrue($tester);
    }
    
    public function testUpdateEmail(){
        $updateUser = new RegUser();
        $tester = $updateUser::updateEmail('remix@yahoo.organization','Testy2');
        $this->assertEquals($tester,true);
    }
    
    public function testUpdateZip(){
        $updateUser = new RegUser();
        $tester = $updateUser::updateZip(72689,"Testy2");
        $this->assertEquals($tester,true);
    }
}
?>