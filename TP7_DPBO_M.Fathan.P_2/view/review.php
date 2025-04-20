<?php
require_once 'class/Review.php';

$review = new Review();
$reviews = $review->getAll();
?>

<center>
    <h3>Review List</h3>
    <a href="?page=reviews&add_review=true"><button>Add Review</button></a>
</center>

<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Review ID</th>
    <th>Rental ID</th>
    <th>Rating</th>
    <th>Comment</th>
    <th>Action</th>
</tr>
<?php foreach ($reviews as $r): ?>
<tr>
    <td><?= $r['review_id'] ?></td>
    <td><?= $r['rental_id'] ?></td>
    <td><?= $r['rating'] ?></td>
    <td><?= $r['comment'] ?></td>
    <td>
        <a href="?page=reviews&edit_review=<?= $r['review_id'] ?>">Edit</a> |
        <a href="?page=reviews&delete_review=<?= $r['review_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>