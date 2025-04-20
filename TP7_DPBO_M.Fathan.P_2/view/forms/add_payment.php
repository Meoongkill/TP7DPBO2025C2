<?php
// views/forms/add_payment.php
if (isset($_POST['create_payment'])) {
    $payment = new Payment();
    $payment->create([
        'rental_id' => $_POST['rental_id'],
        'payment_method' => $_POST['payment_method'],
        'amount' => $_POST['amount'],
        'payment_date' => $_POST['payment_date'],
        'payment_status' => $_POST['payment_status'],
    ]);
    header("Location: ?page=payments");
    exit();
}
?>

<center>
    <h3>Add Payment</h3>
    <form method="POST">
    <label>Rental ID:</label><br>
    <input type="number" name="rental_id" required><br>
    <br></br>

    <label>Method:</label><br>
    <input type="text" name="payment_method" required><br>
    <br></br>

    <label>Amount:</label><br>
    <input type="number" name="amount" step="0.01" required><br>
    <br></br>

    <label>Payment Date:</label><br>
    <input type="date" name="payment_date" required><br>
    <br><br>

    <label>Status:</label><br>
    <input type="text" name="payment_status" required><br>
    <br></br>

    <button type="submit" name="create_payment">Create</button>
</form>
    </center>