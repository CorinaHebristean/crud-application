<?php

require_once "dbconfig.php";
require_once "functions.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION["user_id"];
}

$users = get_all_users();

session_message();

logged_in_user_header();

?>

<p>
<a href="register_form.php">Register users</a>
</p>

<?php if (check_authentication()): ?>
    <p>
    <a href="update_form.php?id=<?php echo $user_id ?>" >Edit my profile</a>
    </p>
<?php endif; ?>

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
        <?php include "user_row.php"; ?>
    <?php endforeach ?>

</table>