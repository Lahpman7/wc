<?PHP
use PHPUnit\Framework\TestCase;
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

    public function testUpdatePassword(){
        $newUser = new RegUser();
        $newUser::insertUser("username_test","password","email@email.com","first", "last", 25, 93901, "consumer", "Court of Masters", 2016);
        $newUser::updatePassword("1111", "username_test");
        $password = $newUser::getPassword("username_test");
        $newUser::deleteUser("username_test");
        
        $this->assertTrue($password == "1111");
    }


    /* Params: username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert_body,$date
    public function testInsertUser(){
        $newUser = new RegUser();
        $tester = $newUser::insertUser("username","password","email@email.com","first", "last", 25, 93901, "consumer", "Court of Masters", 2016);
        $this->assertTrue($tester);
    }
    
    public function findPassword(){
        $newUser = new RegUser();
       
        $tester = $newUser::findPassword("");
        $this->assertTrue($tester);
    }*/
}
?>