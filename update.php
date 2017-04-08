<?php

require_once "dbconfig.php";

if(isset($_POST["submit"])){
    $id = $_GET["id"]; // pentru ca se transmite prin url
    $username = $_POST["username"];
    $email = $_POST["email"];
    $city = $_POST["city"];

    $sql = "UPDATE users
            SET username = '$username',
                email = '$email',
                city = '$city'
            WHERE id = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["message"] = "Utilizatorul a fost actualizat.";
    header ("Location: list.php");
}