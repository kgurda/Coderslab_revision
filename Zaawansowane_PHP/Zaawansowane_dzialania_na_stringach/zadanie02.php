<?php

function createEmail($email) {
    $array=[];
    $list = explode('@', $email);
    $nameSurname = $list[0];
    $server = $list[1];
    
    $name= explode('.', $list[0])[0];
    $firstLetterName= substr($name, 0, 1);
    $surname= explode('.', $list[0])[1];
    
    $array[] = $firstLetterName.'.'.$surname.'@'.$server;
    $array[] = $surname.'@'.$server;
    
    $comPl= explode('.', $server);
    $array[] = $nameSurname.'@'.$comPl[0].'.'.$comPl[2];
    $array[] = $nameSurname.'@poczta.'.$comPl[0].'.'.$comPl[2];
    
    return $array;
}
var_dump(createEmail('katarzyna.gurda@gmail.com.pl'));