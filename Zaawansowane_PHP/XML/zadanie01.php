<?php

$xml = simplexml_load_file('./../xml/reed.xml');

foreach ($xml->course as $xmlCourse){
    $tytul = (string)$xmlCourse->title;
}

var_dump($xml->course[2]->title);