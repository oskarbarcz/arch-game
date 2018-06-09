<?php 
use ArchiGame\Controller\User;

if(isset($_SESSION['Objects']['User']) and $_SESSION['Objects']['User']->userLoggedIn) {
    header("Location: /menu/");
} else {
    // RUNS WHEN LOGGED IN FLAG IS SETTED TRUE
    if(isset($_POST['login']) and $_POST['login'] != null) {
        // RUNS WHEN FORM IS SUBMITTED
        try {
            $_SESSION['Objects']['User'] = new User($_POST['login'], $_POST['password']);
            header("Location: /menu/");
        } catch (\Exception $e) {
            return ['error' => "Podano złe dane logowania"];
        }
    }
}





// return ['error' => 'Podano nieprawodłowe hasło!'];
return [];