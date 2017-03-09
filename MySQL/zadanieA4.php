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
echo 'Udane polaczenie';

$result = $connection->query('CREATE TABLE `bilet`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `ilosc` int(11) NOT NULL,
 `cena` float NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$result = $connection->query('CREATE TABLE `film` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `opis` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$result = $connection->query('CREATE TABLE `kino` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `address` varchar(200) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$result = $connection->query('CREATE TABLE `platnosc` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `typ` varchar(100) NOT NULL,
 `data` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$connection->close();
$connection = null;

