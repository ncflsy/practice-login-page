<?php
require("koneksi.php");
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

$user_name = $_SESSION['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <h1>Selamat datang, <?php echo $user_name; ?></h1>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td>Aksi</td>
        </tr>
        <?php
        $query = "select * from login";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            $userMail = $row['user_email'];
            $userName = $row['fullname'];
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">edit</a>
                    <a href="hapus.php?id=<?php echo $row['id'] ?>">hapus</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>

</body>

</html>