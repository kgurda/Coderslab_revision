<?php

$connection = new mysqli(
    'localhost',
    'root',
    'coderslab'
);
if ($connection->connect_error) {
    die('MAMY BŁAD: ' . $connection->connect_error);
}
echo "Udane polaczenie";

$result = $connection->query("CREATE DATABASE exercises_db");
if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$connection->close();
$connection = null;

