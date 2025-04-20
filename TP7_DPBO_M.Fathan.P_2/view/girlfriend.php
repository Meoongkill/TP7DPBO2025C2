<?php

require_once 'class/Girlfriend.php';

$gf = new Girlfriend();
$gfs = $gf->getAll();
?>

<center>
    <h3>Girlfriend List</h3>
    <a href="?page=girlfriends&add_gf=true"><button>Add Girlfriend</button></a>
</center>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($gfs as $g): ?>
    <tr>
        <td><?= $g['girlfriend_id'] ?></td>
        <td>
    <?php if (!empty($g['photo'])): ?>
        <img src="assets/<?= $g['photo'] ?>" width="80" height="80" style="object-fit: cover;">
    <?php else: ?>
        No Photo
    <?php endif; ?>
</td>

        <td><?= $g['name'] ?></td>
        <td><?= $g['age'] ?></td>
        <td><?= $g['availability_status'] ?></td>
        <td>
            <a href="?edit_gf=<?= $g['girlfriend_id'] ?>">Edit</a> |
            <a href="?delete_gf=<?= $g['girlfriend_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>
