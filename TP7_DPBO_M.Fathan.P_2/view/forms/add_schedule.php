<?php
// views/forms/add_schedule.php
if (isset($_POST['create_schedule'])) {
    $schedule = new Schedule();
    $schedule->create([
        'girlfriend_id' => $_POST['girlfriend_id'],
        'available_date' => $_POST['available_date'],
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time'],
    ]);
    header("Location: ?page=schedules");
    exit();
}
?>
<center>
    <h3>Add Schedule</h3>
<form method="POST">
    <label>Girlfriend ID:</label><br>
    <input type="number" name="girlfriend_id" required><br>
    <br>

    <label>Available date:</label><br>
    <input type="datetime-local" name="available_date" required><br>
    <br>

    <label>start_time:</label><br>
    <input type="datetime-local" name="start_time" required><br>
    <br>

    <label>End Time:</label><br>
    <input type="datetime-local" name="end_time" required><br>
    <br>
    <button type="submit" name="create_schedule">Create</button>
</form>
</center>