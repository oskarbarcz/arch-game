<?php

namespace ArchiGame\Controller;

use ArchFW\Base\Controller;
use ArchFW\Model\Database;

final class Card extends Controller
{
    public function __construct()
    {
        $this->_database - new Database;
    }

    public static function existCard(int $id)
    {

    }

    public static function loadCard(int $id)
    {
        $database = new Database;
        $sql = "SELECT * FROM `cards` WHERE `id` = '$id'";
        $result = $database->execute($sql, 'returnOne');
        if($result){
            return $result;
        } else return false;
    }
}