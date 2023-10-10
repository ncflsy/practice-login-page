<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM login where id='$id'") or die(mysqli_error($koneksi));
header("Location: home.php");
