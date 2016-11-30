<?PHP
use PHPUnit\Framework\TestCase;
include "lib/user.php";

class UserTest extends TestCase
{
    
    public function testUser(){
        $newUser = new RegUser();
        $tester = $newUser::isUser("Testy2");
        $this->assertEquals($tester,false);
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
    
    public function testUpdatePassword(){
        $newUser = new RegUser();
        $newUser::insertUser("username_test","password","email@email.com","first", "last", 25, 93901, "consumer", "Court of Masters", 2016, "default_profile_img.png");
        $newUser::updatePassword("1111", "username_test");
        $password = $newUser::getPassword("username_test");
        $newUser::deleteUser("username_test");
        $this->assertTrue($password == "1111");
    }
}
?>