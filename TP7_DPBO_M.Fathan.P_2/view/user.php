<?php
require_once 'class/User.php';
$user = new User();
$users = $user->getAll();
?>

<center>
    <h3>User List</h3>
    <a href="?page=users&add_user=true"><button>Add User</button></a>
</center>

<table border="1">
    <tr>
        <th>ID</th><th>Username</th><th>Email</th><th>Phone</th><th>Action</th>
    </tr>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u['user_id'] ?></td>
        <td><?= $u['username'] ?></td>
        <td><?= $u['email'] ?></td>
        <td><?= $u['phone_number'] ?></td>
        <td>
            <a href="?edit_user=<?= $u['user_id'] ?>">Edit</a> |
            <a href="?delete_user=<?= $u['user_id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>