<?php 

namespace ArchiGame\Controller;

use ArchFW\Base\Controller;
use ArchFW\Model\Database;


class User extends Controller
{
    private $userName;

    private $actualScore;

    public $userLoggedIn;

    public function __construct(string $userName, string $password, bool $isEncrypted = true)
    {
        $this->_database = new Database;

        $this->userLoggedIn = false;

        if($isEncrypted){
            $password = hash('sha256', $password);
        }

        $this->logUser($userName, $password);
    }

    public function logUser(string $userName, string $password)
    {
        $sql = "SELECT * FROM  `users` WHERE `login` = '$userName' and `password` = '$password';";
        $result = $this->_database->execute($sql, 'returnOne');
        if ($result){
            $this->userName = $result['login'];
            print_r($this->userName);
            $this->userLoggedIn = true;
        } else throw new \Exception("ERR_401_WRONG_DATA");
    }

    public static function isLoginRegistered(string $login)
    {
        $database = new Database();

        $sql = "SELECT * FROM  `users` WHERE `login` = '$login';";
        $result = $database->execute($sql, 'returnFetched');
        if ($result){
            return true;
        } else return false;
    }

    public static function addUser(string $login, string $password, bool $isEncrypted = true)
    {
        $database = new Database();

        if($isEncrypted){
            $password = hash('sha256', $password);
        }
        
        $sql = "INSERT INTO `users` VALUES (NULL, '$login','$password',NULL, NULL, 0);";
        $result = $database->execute($sql, 'returnFetched');

        return true;
    }

    public function getUserName()
    {
        return $this->userName;
    }
}