<?php


$connection = new mysqli(
    'localhost',
    'root',
    'coderslab',
    'users_db'
);
if ($connection->connect_error) {
    die('MAMY BŁAD: ' . $connection->connect_error);
}
echo 'Udane polaczenie';

$result = $connection->query('CREATE DATABASE users_db');
if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "baza utworzona";

$result = $connection->query('CREATE TABLE `UsersAddress` (
 `user_id` int(11) NOT NULL,
 `city` varchar(40) NOT NULL,
 `street` varchar(100) NOT NULL,
 `house` varchar(40) NOT NULL,
 PRIMARY KEY (`user_id`),
 CONSTRAINT `UsersAddress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "tabela utworzona";

$result = $connection->query('CREATE TABLE `Users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "tabela utworzona";

$result = $connection->query('ALTER TABLE `UsersAddress` 
        ADD FOREIGN KEY (`user_id`) REFERENCES `Users`(`id`)
        ON DELETE RESTRICT ON UPDATE RESTRICT;');

if ($result == false) {
    die('BLAD SQL: '. $connection->error);
}
echo "relacja utworzona";

$result = $connection->query("INSERT INTO `Users` JOIN `UsersAddress`
        (`user_id`, `city`, `street`, `house`) 
        VALUES 
        ('2', '12131', '2dsfdf', 'fdsdfs')");
$result = $connection->query("INSERT INTO `UsersAddress` 
        (`user_id`, `city`, `street`, `house`) 
        VALUES 
        ('3', '12131', '2dsfdf', 'fdsdfs')");
$result = $connection->query("INSERT INTO `UsersAddress` 
        (`user_id`, `city`, `street`, `house`) 
        VALUES 
        ('4', '12344131', '2dsfdf', 'fdsdfs')");
$result = $connection->query("INSERT INTO `UsersAddress` 
        (`user_id`, `city`, `street`, `house`) 
        VALUES 
        ('1', '12344131', '2dsfdf', 'fdsdfs')");

$connection->close();
$connection = null;

?>
