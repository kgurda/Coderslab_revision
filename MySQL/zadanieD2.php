<?php

$connection = new mysqli(
    'localhost',
    'root',
    'coderslab',
    'cinemas_db'
);
if ($connection->connect_error) {
    die('MAMY BŁAD: ' . $connection->connect_error);
}
echo "Udane polaczenie <br>";

$sql = 'DELETE FROM kino WHERE name LIKE "%z"';
if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
}

$sql = 'DELETE FROM platnosc WHERE data < CURDATE()-5';
if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
}

$sql = sprintf('DELETE FROM platnosc WHERE id = %s', $_GET['id']);
if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
}

$connection->close();
$connection = null;
?>