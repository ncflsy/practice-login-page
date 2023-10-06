<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <?php
    $edit_id = $_GET['id'];

    require('koneksi.php');
    require('crud/query.php');
    $obj = new crud();
    $data = $obj->getDataById($edit_id);

    if ($data->rowCount() > 0) {
        $row = $data->fetch(PDO::FETCH_ASSOC);
        ?>
        <h2>Edit Data</h2>
        <form action="crud/proses_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['user_email']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $row['user_pass']; ?>" required>

            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>

            <input type="submit" value="Update Data">
        </form>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
    ?>
</body>
</html>
