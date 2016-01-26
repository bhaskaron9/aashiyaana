<?php
    $dsn = 'mysql:host=localhost;dbname=flat_finder';
    $username = 'root';
    $password = '';

    try {
        $con = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('error.php');
        exit();
    }
?>