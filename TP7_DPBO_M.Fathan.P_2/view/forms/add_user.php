<?php
if (isset($_POST['create_user'])) {
    $user = new User();
    $user->create([
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number']
    ]);
    header("Location: ?page=users");
    exit();
}
?>

<center>
    <h3>Add User</h3>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <br><br>
        
        <label>Phone Number:</label><br>
        <input type="text" name="phone_number" required><br><br>
        <button type="submit" name="create_user">Create</button>
    </form>
    <br><br>
    <a href="?page=users">Back to Users</a>
</center>