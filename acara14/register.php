<?php
require('koneksi.php');
require('crud/query.php');
$obj = new crud();
$notif;

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_name'];
    if($obj->insertData($email, $pass, $name)) {
        $notif = '<div class="alert alert-success" > data berhasil disimpan </div>';
    }else{
        $notif = '<div class="alert alert-success" > data gagal disimpan </div>';
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
    <form id="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <label for="txt_email">Username:</label>
      <input type="text" id="txt_email" name="txt_email" required>
      <label for="txt_pass">Password:</label>
      <input type="password" id="txt_pass" name="txt_pass" required>
      <label for="txt_pass">Nama:</label>
      <input type="text" id="txt_name" name="txt_name" required>
      <?php
        if (isset($error)) {
            echo '<div style="color: red;">' . $error . '</div>';
        }
      ?>
      <?php
        if (isset($notif)) {
            echo $notif;
        }
      ?>
      <button type="submit" name="submit">Register</button>
      <label>Sudah punya akun? <a href="login.php">login</a></label>
    </form>
  </div>
</body>
</html>
