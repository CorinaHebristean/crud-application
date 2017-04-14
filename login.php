<?php

require_once "dbconfig.php";

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE username = '$username'
            AND   password = '$password'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $user = $stmt->fetch();
//    var_dump($user);

    if($user){
        $_SESSION["logged_in"] = 1;
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_id"] = $user["id"];
    } else {
        $_SESSION['message'] = 'Bad credentials';
    }

    header("Location: list.php");
}