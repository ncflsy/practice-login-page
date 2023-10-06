<?php
require('koneksi.php');
require('query.php');
$obj = new crud();

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['text_email'];
    $pass = $_POST['text_pass'];
    $name = $_POST['text_name'];
    if($obj->insertData($email, $pass, $name)) {
        echo'<div class="alert alert-success" > data berhasil disimpan </div>';
    }else{
        echo'<div class="alert alert-success" > data gagal disimpan </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="login-container">
    <h2>Register</h2>
    <form id="login-form" method="post" action="login.php">
      <label for="txt_email">Username:</label>
      <input type="text" id="txt_email" name="txt_email" required>
      <label for="txt_pass">Password:</label>
      <input type="password" id="txt_pass" name="txt_pass" required>
      <label for="txt_pass">Nama:</label>
      <input type="text" id="txt_pass" name="txt_name" required>
      <?php
        if (isset($error)) {
            echo '<div style="color: red;">' . $error . '</div>';
        }
      ?>
      <button type="submit" name="submit">Register</button>
      <label>Sudah punya akun? <a href="login.php">login</a></label>
    </form>
  </div>
</body>
</html>
