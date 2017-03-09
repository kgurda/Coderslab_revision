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

$sql = 'SELECT * FROM product';
$result = $connection->query($sql);
if ($result == false) {
    die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
}
echo '<html><body><table border="1">';

foreach ($result as $item) {
    echo sprintf(
        "<tr><td>ID: %d </td><td> Nazwa: %s</td> <td>Opis: %s</td><td>Cena: %s </td><td><a href='%s'>USUN WIERSZ</a></tr>",
        $item['id'],
        $item['name'],
        $item['description'],
        $item['price'],
        sprintf('zadanieC1.php?id=%d', $item['id'])
        
    );
}
echo '</table></body></html>';

$connection->close();
$connection = null;

