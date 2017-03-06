<?php

function __autoload($className) {
    include_once 'src/'.$className.'.php';
}

$client1 = new Client('aaaa', 'aaaaaaaaaa');

if($client1->login('aaaa', 'aaaaaaaaaa')) {
    echo 'klient zalogowany<br>';
} else {
    echo 'błędne hasło lub login<br>';
}
$client1->login('aaaa', 'aaaaaaaaaa2');
$client1->login('aaaa', 'aaaaaaaaaa2');

if($client1->isBlocked()) {
    echo 'użytkownik zablokowany <br>';
}