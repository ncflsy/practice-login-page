<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];
    $nama = $_POST['txt_name'];
    $query = "INSERT INTO user_detail (user_email, user_pass, fullname) 
    VALUES ('$email', '$password', '$nama')";

    if (mysqli_query($koneksi, $query)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="login-container">
        <h2>Register</h2>
        <form id="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label for="txt_email">Username:</label>
            <input type="text" id="txt_email" name="txt_email" required>
            <label for="txt_pass">Password:</label>
            <input type="password" id="txt_pass" name="txt_pass" required>
            <label for="txt_pass">Nama:</label>
            <input type="text" id="txt_name" name="txt_name" required>
            <button type="submit" name="submit">Register</button>
            <label>Sudah punya akun? <a href="login.php">login</a></label>
        </form>
    </div>
</body>

</html>