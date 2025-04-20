<center>
    <h3>Admin List</h3>
</center>
<table border="1">
    <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Role</th>
    </tr>
    <?php foreach ($admin->getAllAdmins() as $mimin): ?>
    <tr>
        <td><?= $mimin['admin_id'] ?></td>
        <td><?= $mimin['username'] ?></td>
        <td><?= $mimin['password'] ?></td>
        <td><?= $mimin['role'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>