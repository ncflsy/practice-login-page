<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('../koneksi.php');
    require('query.php');

    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fullname = $_POST['fullname'];

    $obj = new crud();
    $obj->updateData($id, $email, $pass, $fullname);
    header("Location: ../home.php");
    exit();
}
?>
