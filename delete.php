<?php

require_once "dbconfig.php";

$id = $_GET["id"];

$sql = "DELETE FROM users
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();

$_SESSION["message"] = "Utilizatorul cu id = $id a fost sters.";
header ("Location: list.php");