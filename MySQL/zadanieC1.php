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

if(!isset($_GET['id'])){
    die ('Podaj ID! ');
}

$id = $_GET['id'];
$sql = sprintf('DELETE FROM product WHERE id=%s;', $id);

if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
 }
echo 'Usunięto produkt o ID: '.$id .', ilość wierszy ' . $connection->affected_rows;
$connection->close();
$connection = null;
?>