<?php

function __autoload($className) {
    include_once 'src/'.$className.'.php';
}

$userCollection = new UserSet;
$userCollection->add(new Client('aaaa', 'aaaaaaaaaaaa'));
$userCollection->add(new Client('bbbb', 'bbbbbbbbbbbb'));
$userCollection->add(new Client('cccc', 'cccccccccccc'));


foreach ($userCollection as $key => $user){
    echo $user->getUsername().'<br>';
}

        