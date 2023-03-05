<?php
    $host = "localhost:3306";
    $username = "root";
    $passwordConnection = "root";
    $dbname = "notewebdb";
    $connection = mysqli_connect($host, $username, $passwordConnection, $dbname);

    if (!$connection) {
        exit("Falha na conexão: " . mysqli_connect_error());
    }
?>