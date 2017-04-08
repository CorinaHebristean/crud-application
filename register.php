<?php
require_once "dbconfig.php";

if(isset ($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $city = $_POST["city"];

    //pregatim SQL
    $sql = "INSERT INTO users(username, email, password, city) 
                    VALUES ('$username', '$email', '$password', '$city')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["message"] = "Utilizatorul a fost creat.";
    header ("Location: list.php");
}