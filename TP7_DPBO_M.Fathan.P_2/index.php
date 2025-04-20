<?php
require_once 'class/User.php';
require_once 'class/Girlfriend.php';
require_once 'class/Rental.php';
require_once 'class/Payment.php';
// require_once 'class/Review.php';
require_once 'class/Schedule.php';

$user = new User();
$gf = new Girlfriend();
$rental = new Rental();
$payment = new Payment();
// $review = new Review();
$schedule = new Schedule();

// Tambahkan handler untuk ADD, EDIT, DELETE
if (isset($_GET['delete_user'])) {
    (new User())->delete($_GET['delete_user']);
    header("Location: ?page=users");
    exit();
}
if (isset($_GET['delete_gf'])) {
    (new Girlfriend())->delete($_GET['delete_gf']);
    header("Location: ?page=girlfriends");
    exit();
}
if (isset($_GET['delete_rental'])) {
    (new Rental())->delete($_GET['delete_rental']);
    header("Location: ?page=rentals");
    exit();
}
if (isset($_GET['delete_payment'])) {
    (new Payment())->delete($_GET['delete_payment']);
    header("Location: ?page=payments");
    exit();
}
// if (isset($_GET['delete_review'])) {
//     (new Review())->delete($_GET['delete_review']);
//     header("Location: ?page=reviews");
//     exit();
// }
if (isset($_GET['delete_schedule'])) {
    (new Schedule())->delete($_GET['delete_schedule']);
    header("Location: ?page=schedules");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rent a Girlfriend - Acin Edition</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="assets/RentaruKanojo.png" alt="Rent a Girlfriend: Acin Edition" style="max-width: 100%; height: auto;">
        <nav>
            <a href="?page=users">Users</a> |
            <a href="?page=girlfriends">Girlfriends</a> |
            <a href="?page=rentals">Rentals</a> |
            <a href="?page=payments">Payments</a> |
            <!-- <a href="?page=reviews">Reviews</a> | -->
            <a href="?page=schedules">Schedules</a>
        </nav>
    </header>

    <main>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'users') include 'view/user.php';
            elseif ($page == 'girlfriends') include 'view/girlfriend.php';
            elseif ($page == 'rentals') include 'view/rental.php';
            elseif ($page == 'payments') include 'view/payment.php';
            // elseif ($page == 'reviews') include 'view/review.php';
            elseif ($page == 'schedules') include 'view/schedule.php';
            else echo "<p>Page not found.</p>";
        } else {
            echo "<h2>Welcome to Rent a Girlfriend System</h2><p>Select a menu above to begin.</p>";
        }

        // Include file form add/edit berdasarkan parameter
        if (isset($_GET['add_user'])) include 'view/forms/add_user.php';
        if (isset($_GET['edit_user'])) include 'view/forms/edit_user.php';
        if (isset($_GET['add_gf'])) include 'view/forms/add_girlfriend.php';
        if (isset($_GET['edit_gf'])) include 'view/forms/edit_girlfriend.php';
        if (isset($_GET['add_rental'])) include 'view/forms/add_rental.php';
        if (isset($_GET['edit_rental'])) include 'view/forms/edit_rental.php';
        if (isset($_GET['add_payment'])) include 'view/forms/add_payment.php';
        if (isset($_GET['edit_payment'])) include 'view/forms/edit_payment.php';
        // if (isset($_GET['add_review'])) include 'view/forms/add_review.php';
        // if (isset($_GET['edit_review'])) include 'view/forms/edit_review.php';
        if (isset($_GET['add_schedule'])) include 'view/forms/add_schedule.php';
        if (isset($_GET['edit_schedule'])) include 'view/forms/edit_schedule.php';
        ?>
    </main>

    <footer>
        <p>&copy; <?= date('D.M.Y') ?> Rent a Girlfriend - Acin Edition</p>
    </footer>
</body>
</html>
