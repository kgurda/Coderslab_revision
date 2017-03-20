<?php

function getNameSurname($email) {
    $list = explode('@', $email);
    $nameSurname = explode('.', $list[0]);
    $stringName = implode(' ', $nameSurname);
    $finalString = ucwords($stringName);

    return $finalString;
}
function getInicials($email) {
    $list = explode('@', $email);
    $nameSurname = explode('.', $list[0]);
    return $nameSurname[0][0].$nameSurname[1][0];
}
function getCompany($email) {
    $list = explode('@', $email);
    return str_replace('.com.pl','', $list[1]);
}
$email = 'kasia.gurda@gmail.com';
echo getInicials($email);
echo '<hr>';
echo getNameSurname($email);
echo '<hr>';
echo getCompany($email);