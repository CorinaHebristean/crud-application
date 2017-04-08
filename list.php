<?php

require_once "dbconfig.php";

$sql = "SELECT * FROM users";

$stmt = $conn->prepare($sql);

$stmt->execute();

$users = $stmt -> fetchAll();

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

<table border=1>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>City</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user["id"] ?></td>
        <td><?php echo $user["username"] ?></td>
        <td><?php echo $user["email"] ?></td>
        <td><?php echo $user["password"] ?></td>
        <td><?php echo $user["city"] ?></td>
        <td>
            <a href="update_form.php?id=<?php echo $user["id"] ?>">Edit</a>
            <a href="delete.php?id=<?php echo $user["id"] ?>"
                onclick="if (!window.confirm('Are you sure?')) return false;"
               >Delete</a>
        </td>
    </tr>

    <?php endforeach ?>

</table>