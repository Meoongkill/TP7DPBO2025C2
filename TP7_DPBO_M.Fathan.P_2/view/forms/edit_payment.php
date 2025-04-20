<?php
// views/forms/edit_payment.php
if (isset($_POST['update_payment'])) {
    $payment = new Payment();
    $payment->update($_GET['edit_payment'], [
        'rental_id' => $_POST['rental_id'],
        'payment_method' => $_POST['payment_method'],
        'amount' => $_POST['amount'],
        'payment_date' => $_POST['payment_date'],
        'payment_status' => $_POST['payment_status'],
    ]);
    header("Location: ?page=payments");
    exit();
}
$edit_payment = (new Payment())->getById($_GET['edit_payment']);
?>
<center>
    <h3>Edit Payment</h3>
<form method="POST">
    <label>Rental ID:</label><br>
    <input type="number" name="rental_id" value="<?= $edit_payment['rental_id'] ?>" required>
    <br></br>

    <label>Method:</label><br>
    <input type="text" name="payment_method" value="<?= $edit_payment['payment_method'] ?>" required>
    <br></br>

    <label>Amount:</label><br>
    <input type="number" name="amount" step="0.01" value="<?= $edit_payment['amount'] ?>" required>
    <br></br>

    <label>Payment Date:</label><br>
    <input type="date" name="payment_date" value="<?= $edit_payment['payment_date'] ?>" required>
    <br></br>

    <label>Status:</label><br>
    <input type="text" name="payment_status" value="<?= $edit_payment['payment_status'] ?>" required>
    <br></br>

    <button type="submit" name="update_payment">Update</button>
</form>
</center>