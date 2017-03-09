<?php
$connection = new mysqli(
    'localhost',
    'root',
    'coderslab',
    'exercises_db'
);
if ($connection->connect_error) {
    die('MAMY BŁAD: ' . $connection->connect_error);
}
echo "Udane polaczenie";
$connection->query("SET NAMES utf8");

$sql = 'INSERT INTO product VALUES(null, "Czekoladki", "Opis czekoladek", 150)';
$result = $connection->query($sql);
if ($result == false) {
    die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
}
$sql = 'INSERT INTO product VALUES(null, "Opony", "Opis opiny", 60)';
$connection->query($sql);
if ($result == false) {
    die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
}
$sql = 'INSERT INTO product VALUES(null, "Plyny", "Opis cos tam", 1500)';
$connection->query($sql);
if ($result == false) {
    die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
}

$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];

$sql = sprintf('INSERT INTO product VALUES(null, "%s", "%s", %d)',
        $name,
        $description,
        $price
        );
$connection->query($sql);
if ($sql == false) {
    die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
}
echo "dodano produkt o ID: ". $connection->insert_id;

$connection->close();
$connection = null;
