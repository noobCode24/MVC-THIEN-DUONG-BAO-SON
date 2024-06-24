<?php
try {
    if (class_exists('PDO')) {
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;
        $conn = new PDO(
            $dsn,
            _USER,
            _PASS,
            $option
        );
    }
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    die();
}   
