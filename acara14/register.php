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
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>email</p>
        <input type="text" name="txt_email" required>
        <p>password</p>
        <input type="text" name="txt_password" required>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>