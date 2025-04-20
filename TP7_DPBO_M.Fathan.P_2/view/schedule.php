<?php
require_once 'class/Schedule.php';

$schedule = new Schedule();
$schedules = $schedule->getAll();
?>

<center>
  <h3>Schedule List</h3>
  <a href="?page=schedules&add_schedule=true"><button>Add Schedule</button></a>
</center>

<table border="1">
<tr>
  <th>ID</th>
  <th>GF</th>
  <th>Date</th>
  <th>Start</th>
  <th>End</th>
  <th>Action</th> <!-- Tambahan di sini -->
</tr>

<?php foreach ($schedules as $s): ?>
<tr>
    <td><?= $s['schedule_id'] ?></td>
    <td><?= $s['name'] ?></td>
    <td><?= $s['available_date'] ?></td>
    <td><?= $s['start_time'] ?></td>
    <td><?= $s['end_time'] ?></td>
    <td>
        <a href="?edit_schedule=<?= $s['schedule_id'] ?>">Edit</a> |
        <a href="?delete_schedule=<?= $s['schedule_id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
