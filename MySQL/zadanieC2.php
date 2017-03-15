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

if(!isset($_GET['id']) && !isset($_GET['table'])){
    die ('Podaj ID i tabelę! ');
}
$table = $_GET['table'];
$id = $_GET['id'];

$sql = sprintf('DELETE FROM %s WHERE id=%s;', $table, $id);

if ($sql) {
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
 }
echo 'Usunięto produkt o ID: '.$id .' z tabeli: '.$table.' ilość wierszy ' . $connection->affected_rows;
 
$connection->close();
$connection = null;
?>