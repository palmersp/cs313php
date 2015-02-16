<?php
function conPHP() {
    $server = '';
    $database = '';
    $username = '';
    $password = '';
    $dsn = "mysql:host=$server; dbname=$database";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $conPHP = new PDO($dsn, $username, $password, $option);
    } catch (PDOException $exc) {
        header('location: /errordocs/500.php');
        exit;
    }
    return $conPHP;
}

?>
