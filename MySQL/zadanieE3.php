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
echo 'Udane polaczenie <br>';

$sql = 'SELECT  * FROM `Tickets`';
$resultTickets = $connection->query($sql);
foreach ($resultTickets as $row){
    echo sprintf('Ilość:  %s Cena: %s <br>',
            $row['quantity'],
            $row['price']
            );
}
echo '<hr>';

$sql = "SELECT id From Tickets  ";
    $result = $connection->query($sql);
    foreach ($result as $row){
    }
    $last_item= end($row);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        if($price>0){
            $sql = "INSERT INTO `Tickets` (`quantity`, `price`) VALUES ('$quantity', '$price')";
        } else { 
            die('Zła cena');
        }
        $result = $connection->query($sql);
}}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $payment_type = $_POST['payment_type'];
        $date = $_POST['payment_date'];
        if($payment_type == 'transfer' || $payment_type == 'cash' || $payment_type == 'card'|| $payment_type == 'none'){
            $sql = "INSERT INTO `Payment` (`id`, `type`, `date`) VALUES ('".++$last_item."', '".$payment_type."', '$date')";
        } else { 
            die('Zła metoda płatności');}
        }
        if ($sql) {
        $result = $connection->query($sql);
        if ($result == false) {
            die(sprintf("DLA SQL: %s MAMY BŁAD: %s", $sql, $connection->error));
        }
    }

    $connection->close();
    $connection = null;
}

$sql = "SELECT * FROM Payment JOIN Tickets ON Tickets.id=Payment.id WHERE Payment.type = 'transfer'";
$result = $connection->query($sql);
echo "Bilety zapłacone przelewem: ";
foreach ($result as $row){
    echo sprintf('<br>Id: %s Ilość: %s Cena: %s <br>',
            $row['id'],
            $row['quantity'],
            $row['price']
            );
}
echo '<hr>';

$sql = "SELECT * FROM Payment JOIN Tickets ON Tickets.id=Payment.id WHERE Payment.type = 'cash'";
$result = $connection->query($sql);
echo "Bilety zapłacone gotówką: ";
foreach ($result as $row){
    echo sprintf('<br>Id: %s Ilość: %s Cena: %s <br>',
            $row['id'],
            $row['quantity'],
            $row['price']
            );
}
echo '<hr>';

$sql = "SELECT * FROM Payment JOIN Tickets ON Tickets.id=Payment.id WHERE Payment.type = 'card'";
$result = $connection->query($sql);
echo "Bilety zapłacone kartą: ";
foreach ($result as $row){
    echo sprintf('<br>Id: %s Ilość: %s Cena: %s <br>',
            $row['id'],
            $row['quantity'],
            $row['price']
            );
}
echo '<hr>';

$sql = "SELECT * FROM Payment JOIN Tickets ON Tickets.id=Payment.id WHERE Payment.type = 'none'";
$result = $connection->query($sql);
echo "Bilety niezapłacone: ";
foreach ($result as $row){
    echo sprintf('<br>Id: %s Ilość: %s Cena: %s',
            $row['id'],
            $row['quantity'],
            $row['price']
            );
}
?>

<html>
    <head>
        <title>zadanieE3</title>
    </head>
    <body>
        <div>
        </div>
<!--        <div>
            <form class="movie_form" method="post" action="#">
                <label>Nazwa</label><br>
                <select name="title">
                    <option value="transfer">Przelew</option>
                </select><br>
            </form>
        </div>-->
        <div>
            <form class="ticket_form" method="post" action="#">
                <label>Ilosc</label><br>
                <input name="quantity" type="number" min="0"/><br>
                <label>Cena</label><br>
                <input name="price" type="number" min="0" step="0.01"/><br>

                <select name="payment_type">
                    <option value="transfer">Przelew</option>
                    <option value="cash">Gotówka</option>
                    <option value="card">Karta</option>
                    <option value="none">Brak opłaty</option>
                </select><br>
                <label>Data</label><br>
                <input type="date" name="payment_date"><br>
                <button type="submit" name="submit" value="payment">Wyślij</button>
            </form>
        </div>

    </body>
</html>
