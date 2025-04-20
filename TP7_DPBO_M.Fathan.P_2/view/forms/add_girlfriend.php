<?php
// views/forms/add_girlfriend.php
if (isset($_POST['create_girlfriend'])) {
    $target_dir = "assets/";
    $filename = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $filename;


    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $gf = new Girlfriend();
        $gf->create([
            'name' => $_POST['name'],
            'age' => $_POST['age'],
            'availability_status' => $_POST['availability_status'],
            'photo' => $filename
        ]);
        exit();
    } else {
        $uploadError = true;
    }
}
?>

<!-- HTML MULAI DI SINI -->
<center>
    <h3>Add Girlfriend</h3>
    <?php if (!empty($uploadError)) echo "<p>Failed to upload image.</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" required><br><br>
        
        <label>Availability Status:</label><br>
        <input type="text" name="availability_status" required><br><br>

        <label>Photo:</label><br>
        <input type="file" name="photo" accept="image/*" required><br><br>

        <button type="submit" name="create_girlfriend">Create</button>
    </form>
</center>
