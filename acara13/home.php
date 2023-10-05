<?php
require('koneksi.php');

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(!empty(trim($email)) && !empty(trim($pass))){
        $query = "select from login where user_email = '$user_email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while(mysqli_fetch_array($result)){
            $id = $row['id'];
            $emailVal = $row['user_email'];
            $passVal = $row['user_pass'];
        }

        if($num != 0){
            if($emailVal == $email && $passVal == $pass){
                header('Location: home.php');
            }else{
                $error = 'user dan pasword salah ';
                header('Location: login.php');
            }
        }  else{
            $error = "user tidak ditemukan";
            echo $error;
        }
    }else{
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
</head>
<body>
    <form action="">
        <p>email: </p>
        <input type="text" name="txt_email">
        <p>password: </p>
        <input type="text" name="txt_pass">
        <button type="submit" name="submit">Sign In</button>
    </form>
</body>
</html>