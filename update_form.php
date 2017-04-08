<?php

require_once "dbconfig.php";

$id = $_GET["id"];

$sql = "SELECT * FROM users 
            WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();

//var_dump($user);


?>

<!DOCTYPE html>
<html>
<body>

<form action="update.php?id=<?php echo $user["id"] ?>" method="post">
    <p>
        Username: <input type="text" name="username" value="<?php echo $user["username"] ?>">
    </p>

    <p>
        E-mail: <input type="email" name="email" value="<?php echo $user["email"] ?>">
    </p>

    <p>
        City: <input type="text" name="city" value="<?php echo $user["city"] ?>">
    </p>

    <input type="submit" name="submit" value="Submit!">

</form>

</body>
</html>