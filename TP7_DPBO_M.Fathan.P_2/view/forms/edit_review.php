<?php
// views/forms/edit_review.php
if (isset($_POST['update_review'])) {
    $review = new Review();
    $review->update($_GET['edit_review'], [
        'rental_id' => $_POST['rental_id'],
        'rating' => $_POST['rating'],
        'comment' => $_POST['comment']
    ]);
    header("Location: ?page=reviews");
    exit();
}
$edit_review = (new Review())->getById($_GET['edit_review']);
?>
<center>
    <h3>Edit Review</h3>
    <form method="POST">
    <label>Rental ID:</label><br>
    <input type="number" name="rental_id" value="<?= $edit_review['rental_id'] ?>" required><br>
    <br>

    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" value="<?= $edit_review['rating'] ?>" required><br>
    <br>

    <label>Comment:</label><br>
    <textarea name="comment" required><?= $edit_review['comment'] ?></textarea><br><br>
    <button type="submit" name="update_review">Update</button>
</form>
</center>