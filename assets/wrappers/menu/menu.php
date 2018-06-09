<?php 

if(isset($_SESSION['Objects']['User']) and $_SESSION['Objects']['User']->userLoggedIn) {
    $username = $_SESSION['Objects']['User']->getUserName();
    return [
        'mode' => "menu",
        "username" => $username
    ];
} else return ['mode' => "log"];


