<?php

session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'curs';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}