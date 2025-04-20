<?php
// views/forms/edit_schedule.php
if (isset($_POST['update_schedule'])) {
    $schedule = new Schedule();
    $schedule->update($_GET['edit_schedule'], [
        'girlfriend_id' => $_POST['girlfriend_id'],
        'available_date' => $_POST['available_date'],
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time'],
    ]);
    header("Location: ?page=schedules");
    exit();
}
$edit_schedule = (new Schedule())->getById($_GET['edit_schedule']);
?>
<center>
    <h3>Edit Schedule</h3>
    <form method="POST">
    <label>Girlfriend ID:</label><br>
    <input type="number" name="girlfriend_id" value="<?= $edit_schedule['girlfriend_id'] ?>" required><br>
    <br>

    <label>Available date:</label><br>
    <input type="datetime-local" name="available_date" value="<?= date('Y-m-d\TH:i', strtotime($edit_schedule['available_date'])) ?>" required><br>
    <br>

    <label>Start Time:</label><br>
    <input type="datetime-local" name="start_time" value="<?= date('Y-m-d\TH:i', strtotime($edit_schedule['start_time'])) ?>" required><br>
    <br>

    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" value="<?= date('Y-m-d\TH:i', strtotime($edit_schedule['end_time'])) ?>" required><br>
    <br>
    <button type="submit" name="update_schedule">Update</button>
</form>

</center>