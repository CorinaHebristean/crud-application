<?php


// Check if user is logged in 
function check_authentication() {
    if ( isset($_SESSION['logged_in']) && $_SESSION["logged_in"] == 1) {

        return true;
    }

    return false;
}

// list all users from database
function get_all_users() {
    global $conn;

    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt -> fetchAll();

    return $users;
}

function session_message() {
    if(isset($_SESSION["message"])){
        echo "<p>" . $_SESSION["message"] . "</p>";
        unset($_SESSION["message"]);
    }
}

function logged_in_user_header() {
    if (isset($_SESSION['logged_in'])) {
        echo "<h3>Bine ai venit, " .  $_SESSION['username'] . "</h3>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "<a href='login_form.php'>Login</a>";
    }    
}