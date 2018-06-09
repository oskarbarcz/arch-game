<?php 

use ArchiGame\Controller\Card;

if(isset($_SESSION['Objects']['User']) and $_SESSION['Objects']['User']->userLoggedIn) {
    $id = $_SESSION['Variables']['ActualCard'];
    if($card = Card::loadCard($id)) {
        if($card['linkContent']) {
            $links = explode(';', $card['linkContent']);
            $keys = [];
            foreach ($links as $each => $key) {
                $arr = explode(":", $key);
                $keys += [$arr[1] => $arr[0]];
            }
            return [
                'number'=> $id,
                'card' => $card,
                'links' => $keys
            ];
        } else return [
            'number'=> $id,
            'card' => $card,
            'links' => []
        ];
        
        
    } else header("Location: /card/9999");
    die;
} else header("Location: /menu");
