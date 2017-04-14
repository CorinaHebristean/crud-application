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
