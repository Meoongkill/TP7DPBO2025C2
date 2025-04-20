<?php
// views/forms/add_review.php
if (isset($_POST['create_review'])) {
    $review = new Review();
    $review->create([
        'rental_id' => $_POST['rental_id'],
        'user_id' => $_SESSION['user_id'], // ✅ ambil dari session login
        'rating' => $_POST['rating'],
        'comment' => $_POST['comment']
    ]);
    header("Location: ?page=reviews");
    exit();
}
?>
<center>
    <h3>Add Review</h3>
    <form method="POST">
    <label>Rental ID:</label><br>
    <input type="number" name="rental_id" required><br>
    <br>

    
    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" required><br>
    <br>

    <label>Comment:</label><br>
    <textarea name="comment" required></textarea><br><br>
    <button type="submit" name="create_review">Create</button>
</form>
</center>