<?php
require_once 'class/User.php';
require_once 'class/Girlfriend.php';

$users = (new User())->getAll();
$gfs = (new Girlfriend())->getAll();
?>

<?php
require_once 'class/Rental.php';

if (isset($_POST['create_rental'])) {
    $rental = new Rental();

    // Hitung total harga dan status default (optional)
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];

    $startTime = new DateTime($start);
    $endTime = new DateTime($end);
    $interval = $startTime->diff($endTime);
    $hours = $interval->h + ($interval->days * 24);

    $pricePerHour = 100000; // contoh harga
    $totalPrice = $hours * $pricePerHour;

    $rental->create([
        'user_id' => $_POST['user_id'],
        'girlfriend_id' => $_POST['girlfriend_id'],
        'start_date' => $start,
        'end_date' => $end,
        'status' => $_POST['status'],
        'total_price' => $totalPrice
    ]);

    header("Location: ?page=rentals");
    exit();
}
?>


<center>
    <h3>Add Rental</h3>
    <form method="POST">
        <label>User ID:</label><br>
            <select name="user_id" required>
            <option value="">-- Select User --</option>
                <?php foreach ($users as $u): ?>
                 <option value="<?= $u['user_id'] ?>"><?= $u['username'] ?> (ID: <?= $u['user_id'] ?>)</option>
                <?php endforeach; ?>
            </select><br><br>

        <label>Girlfriend ID:</label><br>
            <select name="girlfriend_id" required>
            <option value="">-- Select Girlfriend --</option>
                <?php foreach ($gfs as $g): ?>
                <option value="<?= $g['girlfriend_id'] ?>"><?= $g['name'] ?> (ID: <?= $g['girlfriend_id'] ?>)</option>
                <?php endforeach; ?>
            </select><br><br>

        <label>Start Time:</label><br>
        <input type="datetime-local" name="start_time" required><br>
        <br></br>

        <label>End Time:</label><br>
        <input type="datetime-local" name="end_time" required><br><br>
        <br></br>

        <label>Status:</label><br>
        <input type="text" name="status" value="ongoing" required><br>
        <br></br>

        <label>Total Price:</label><br>
        <input type="number" value="<?= isset($totalPrice) ? $totalPrice : '' ?>" required><br>
        <br></br>
    <button type="submit" name="create_rental">Create</button>
</form>
</center>