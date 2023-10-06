<?php
$koneksi = mysqli_connect("localhost", "root", "","user");

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "select * from login where user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            while ($row = mysqli_fetch_array($result)) {
                $userVal = $row['user_email'];
                $passVal = $row['user_pass'];
                $userName = $row['fullname'];   
            }

            if ($userVal == $email && $passVal == $pass) {
                header('Location: home.php?fullname='.urldecode($userName));
                exit;
            } else {
                $error = 'Username atau password salah';
            }
        } else {
            $error = 'User tidak ditemukan';
        }
    } else {
        $error = 'Data tidak boleh kosong';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="login-container">
    <h2>Login</h2>
    <form id="login-form" method="post" action="login.php">
      <label for="txt_email">Username:</label>
      <input type="text" id="txt_email" name="txt_email" required>
      
      <label for="txt_pass">Password:</label>
      <input type="password" id="txt_pass" name="txt_pass" required>
      <?php
        if (isset($error)) {
            echo '<div style="color: red;">' . $error . '</div>';
        }
      ?>
      <button type="submit" name="submit">Login</button>
      <label>Belum punya akun? <a href="register.php">daftar</a></label>
    </form>
  </div>
</body>
</html>
