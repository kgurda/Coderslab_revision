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
        "<tr>
            <td>ID: %d </td>
            <td>Nazwa: %s</td>
            <td>Opis: %s</td>
            <td>Cena: %s </td>
        </tr>",
        $item['id'],
        $item['name'],
        $item['description'],
        $item['price']
    );

    $sql = sprintf("SELECT * FROM opinions WHERE product_id = %d;", $item['id']);
    $result = $connection->query($sql);
    if ($result == false) {
        die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
    }
    foreach ($result as $opinion) {
        echo sprintf(
            "
        <tr>
            <td>Opinia</td>
            <td colspan='4'>%s</td>
        </tr>
",$opinion['description']
        );
    }
}
echo '</table></body></html>';

$connection->close();
$connection = null;

//SELECT product.name, opinions.description
//FROM `product` 
//JOIN opinions ON opinions.product_id = product.id
//
//SELECT product.name, opinions.description AS nowy_opis
//FROM `product` 
//JOIN opinions ON opinions.product_id = product.id 
//
//SELECT *
//FROM `product` 
//JOIN opinions ON opinions.product_id = product.id
//
//SELECT product.id, product.name AS nazwa, opinions.description AS opinia
//FROM `product` 
//JOIN opinions ON opinions.product_id = product.id
//WHERE product.id = 11 
//
//SELECT product.id, product.name AS nazwa, opinions.description AS opinia
//FROM `product` 
//LEFT JOIN opinions ON opinions.product_id = product.id
//
//SELECT *
//FROM `product` 
//LEFT JOIN opinions ON opinions.product_id = product.id
//WHERE opinions.product_id IS NULL AND product.price<100