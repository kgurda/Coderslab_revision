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
echo "Udane polaczenie <br>";

$sql = sprintf('DELETE FROM product WHERE price>200');
if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
}
 
$sql='DELETE FROM product WHERE name LIKE "c%"';
if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
}

$connection->close();
$connection = null;
?>