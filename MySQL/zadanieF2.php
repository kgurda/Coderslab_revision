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

    $sql = "SELECT * FROM Seans";
    $result = $connection->query($sql);
  
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        If(isset($_POST['submit'])) {
            $movieId = $_POST['id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
        if($price>0){
            $sql = "INSERT INTO `Tickets` (`id`,`quantity`, `price`,`seans_id`) VALUES (null, '$quantity', '$price', '$movieId')";
        } else { 
            die('Zła cena');
        }
        $result = $connection->query($sql);
        }
    }

$connection->close();
$connection = NULL;

?>

<html>
    <head>
        <title>Zadanie F2</title>
    </head>
    <body>
        <div>
            <form class="ticket_form" method="post" action="#">
                <select name="id">
                <?php
                 foreach ($result as $seans) {
                    echo '<option name="'.$seans['movie_name'].'" value="'.$seans['id'].'">'.$seans['movie_name'];
                    echo '</option>';
                } ?>
                </select><br>
                <label>Ilosc</label><br>
                <input name="quantity" type="number" min="0"/><br>
                <select name="option">
                    <option value="normalny">Normalny</option>
                    <option value="ulgowy">Ulgowy</option>
                </select><br>
                <label>Cena</label><br>
                <input name="price" type="number" min="0" step="0.01"/><br>
                <input type="submit" name="submit" value="Kup bilet">
            </form>
        </div>
    </body>
</html>