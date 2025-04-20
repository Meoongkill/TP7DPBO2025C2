<?php
// views/forms/edit_user.php
if (isset($_POST['update_user'])) {
    $user = new User();
    $user->update($_GET['edit_user'], [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number']
    ]);
    header("Location: ?page=users");
    exit();
}
$edit_user = (new User())->getById($_GET['edit_user']);
?>

<center>
    <h3>Edit User</h3>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $edit_user['username'] ?>" required><br>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $edit_user['email'] ?>" required><br>
        <br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone_number" value="<?= $edit_user['phone_number'] ?>" required><br><br>
        <br><br>

        <button type="submit" name="update_user">Update</button>
    </form>
</center>