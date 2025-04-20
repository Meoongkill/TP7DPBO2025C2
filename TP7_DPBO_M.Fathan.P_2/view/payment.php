<?php
require_once 'class/Payment.php';

$payment = new Payment();
$payments = $payment->getAll();

?>

<center>
    <h3>Payment List</h3>
    <a href="?page=payments&add_payment=true"><button>Add Payment</button></a>
</center>

<table border="1">
<tr>
  <th>ID</th>
  <th>Rental ID</th>
  <th>Method</th>
  <th>Amount</th>
  <th>Date</th>
  <th>Status</th>
  <th>Action</th>
</tr>

<?php foreach ($payments as $p): ?>
<tr>
    <td><?= $p['payment_id'] ?></td>
    <td><?= $p['rental_id'] ?></td>
    <td><?= $p['payment_method'] ?></td>
    <td><?= $p['amount'] ?></td>
    <td><?= $p['payment_date'] ?></td>
    <td><?= $p['payment_status'] ?></td>
    <td>
        <a href="?edit_payment=<?= $p['payment_id'] ?>">Edit</a> |
        <a href="?delete_payment=<?= $p['payment_id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<hr>