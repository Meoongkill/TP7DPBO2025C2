<?php
require_once 'class/Rental.php';

$rental = new Rental();
$rentals = $rental->getAll();
?>

<center>
    <h3>Rental List</h3>
    <a href="?page=rentals&add_rental=true"><button>Add Rental</button></a>
</center>

<table border="1">
<tr><th>ID</th><th>User</th><th>GF</th><th>Start</th><th>End</th><th>Status</th><th>Total</th></tr>
<?php foreach ($rentals as $r): ?>
<tr>
    <td><?= $r['rental_id'] ?></td>
    <td><?= $r['username'] ?></td>
    <td><?= $r['girlfriend_name'] ?></td>
    <td><?= $r['start_date'] ?></td>
    <td><?= $r['end_date'] ?></td>
    <td><?= $r['status'] ?></td>
    <td><?= $r['total_price'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<hr>