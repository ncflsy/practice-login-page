<?php
require('../koneksi.php');
require('query.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];

    $obj = new crud();
    $obj->deleteData($id_to_delete);
    header("Location: ../home.php");
    exit();
} else {
    echo "Invalid request";
}
?>
