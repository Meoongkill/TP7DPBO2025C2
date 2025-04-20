<?php
$id = $_GET['edit_gf'];
$data = (new Girlfriend())->getById($id);

if (isset($_POST['update_girlfriend'])) {
    $photo_name = $data['photo']; // default, gunakan foto lama

    if (!empty($_FILES['photo']['name'])) {
        $target_dir = "assets/";
        $photo_name = uniqid() . '_' . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $photo_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // success upload, gunakan foto baru
        } else {
            echo "<p>Failed to upload new image. Using old image.</p>";
        }
    }

    (new Girlfriend())->update($id, [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'availability_status' => $_POST['availability_status'],
        'photo' => $photo_name
    ]);
    header("Location: ?page=girlfriends");
    exit();
}
?>

<center>
    <h3>Edit Girlfriend</h3>
<form method="POST" enctype="multipart/form-data">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $data['name'] ?>" required><br>
    <br></br>

    <label>Age:</label><br>
    <input type="number" name="age" value="<?= $data['age'] ?>" required><br>
    <br></br>

    <label>Availability Status:</label><br>
    <input type="text" name="availability_status" value="<?= $data['availability_status'] ?>" required><br>
    <br></br>

    <label>Photo:</label><br>
    <input type="file" name="photo" accept="image/*"><br>
    <br></br>

    <small>Current: <img src="assets/<?= $data['photo'] ?>" width="80"></small><br><br>
    <button type="submit" name="update_girlfriend">Update</button>
</form>
</center>