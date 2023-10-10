<?php
require("koneksi.php");
if (isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userMail = $_POST['txt_mail'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_name'];

    $query = "update login set user_pass='$userPass', fullname='$userName' 
    where id='$userId'";
    echo $query;
    header('Location: home.php');
}
$id = $_GET['id'];
$query = "select * from login where id='$id'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $userMail = $row['user_email'];
    $userPass = $row['user_pass'];
    $userName = $row['fullname'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $userMail ?>" required>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $userPass; ?>" required>

        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $userName; ?>" required>

        <input type="submit" value="Update Data">
    </form>
</body>

</html>