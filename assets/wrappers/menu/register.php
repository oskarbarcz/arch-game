<?php 
use ArchiGame\Controller\User;

if(isset($_POST['login']) and $_POST['login'] != null) {
    // RUNS ON FORM SUBMIT
    if($_POST['password'] !== $_POST['password2']) {
        return ['error' => "Hasła nie są takie same!"];
    } elseif(User::isLoginRegistered($_POST['login'])) {
        return ['error' => "Konto o takim loginie już istnieje!"];
    } else {
        User::addUser($_POST['login'], $_POST['password']);
        $login = $_POST['login'];
        return ['good' => "Założono konto, login: $login"];
    }
}

return [];