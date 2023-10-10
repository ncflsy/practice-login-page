<?php
require('koneksi.php');

session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "select * from login where user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $emailVal = $row['user_email'];
            $passVal = $row['user_pass'];
            $userName = $row['fullname'];
            $level = $row['level'];
        }

        if ($num != 0) {
            if ($emailVal == $email && $passVal == $pass) {
                $_SESSION['fullname'] = $userName;
                header('Location: home.php');
            } else {
                $error = 'user dan pasword salah ';
                echo $error;
            }
        } else {
            $error = "user tidak ditemukan";
            echo $error;
        }
    } else {
        $error = "data kosongg";
        echo "$error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <p>email: </p>
            <input type="text" name="txt_email">
            <p>password: </p>
            <input type="text" name="txt_pass">
            <button type="submit" name="submit">Sign In</button>
        </form>
    </div>

</body>

</html>