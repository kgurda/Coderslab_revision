<?php

$xml = file_get_contents('./../xml/uwm.xml');
$uwm = new XMLReader;
$uwm->XML($xml);

$levelList = [];
while($uwm->read()) {
    if($uwm->name == 'level') {
        $levelValue = $uwm->readString();
        if(isset($levelList[$levelValue])) {
            $levelList[$levelValue]++;
        } else {
            $levelList[$levelValue] = 1;
        }
    }
}

var_dump($levelList);