<?php

require_once "dbconfig.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM users";

$stmt = $conn->prepare($sql);

$stmt->execute();

$users = $stmt -> fetchAll();


function check_authentication() {
    if ( isset($_SESSION['logged_in']) && $_SESSION["logged_in"] == 1) {

        return true;
    }

    return false;
}

if(isset($_SESSION["message"])){
    echo "<p>" . $_SESSION["message"] . "</p>";
    unset($_SESSION["message"]);
}

if (isset($_SESSION['logged_in'])) {
    echo "<h3>Bine ai venit, " .  $_SESSION['username'] . "</h3>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<a href='login_form.php'>Login</a>";
}



?>

<p>
<a href="register_form.php">Register users</a>
</p>

<p>
<a href="update_form.php?id=<?php echo $user_id ?>" >Edit my profile</a>
</p>

<table border=1>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <?php if ( check_authentication()): ?>
            <th>Password</th>
        <?php endif; ?>
        <th>City</th>
        <?php if ( check_authentication()): ?>
            <th>Actions</th>
        <?php endif; ?>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user["id"] ?></td>
        <td><?php echo $user["username"] ?></td>
        <td><?php echo $user["email"] ?></td>
        <?php if ( check_authentication()): ?>
            <td><?php echo $user["password"] ?></td>
        <?php endif; ?>

        <td><?php echo $user["city"] ?></td>

        <?php if ( check_authentication()): ?>
        <td>
            <a href="update_form.php?id=<?php echo $user["id"] ?>">Edit</a>
            <a href="delete.php?id=<?php echo $user["id"] ?>"
                onclick="if (!window.confirm('Are you sure?')) return false;"
               >Delete</a>
        </td>
        <?php endif; ?>
    </tr>

    <?php endforeach ?>

</table>