<?php
// views/forms/edit_rental.php
if (isset($_POST['update_rental'])) {
    $rental = new Rental();
    $rental->update($_GET['edit_rental'], [
        'user_id' => $_POST['user_id'],
        'girlfriend_id' => $_POST['girlfriend_id'],
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time']
    ]);
    header("Location: ?page=rentals");
    exit();
}
$edit_rental = (new Rental())->getById($_GET['edit_rental']);
?>
<h3>Edit Rental</h3>
<form method="POST">
    <label>User ID:</label><br>
    <input type="number" name="user_id" value="<?= $edit_rental['user_id'] ?>" required><br>
    <label>Girlfriend ID:</label><br>
    <input type="number" name="girlfriend_id" value="<?= $edit_rental['girlfriend_id'] ?>" required><br>
    <label>Start Time:</label><br>
    <input type="datetime-local" name="start_time" value="<?= date('Y-m-d\TH:i', strtotime($edit_rental['start_time'])) ?>" required><br>
    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" value="<?= date('Y-m-d\TH:i', strtotime($edit_rental['end_time'])) ?>" required><br><br>
    <button type="submit" name="update_rental">Update</button>
</form>
