<?php 

namespace ArchiGame\Controller;

use ArchFW\Base\Controller;


class User extends Controller
{
    private $userName;

    private $actualScore;

    public $userLoggedIn;

    public function __construct(string $userName, string $password, bool $isEncrypted = true)
    {
        $this->_database = new \ArchFW\Model\Database;

        $this->userLoggedIn = false;

        if($isEncrypted){
            $password = hash('sha256', $password);
        }

        $this->logUser($userName, $password);
    }

    public function logUser(string $userName, string $password)
    {
        $sql = "SELECT * FROM  `users` WHERE `login` = '$userName' and `password` = '$password';";
        $result = $this->_database->execute($sql, 'returnFetched');
        if ($result){
            $this->userLoggedIn = true;
        } else throw new \Exception("ERR_401_WRONG_DATA");
    }
}