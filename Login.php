<?php
session_start();
if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}
require 'function.php';
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result= mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");


    //cek username
    if(mysqli_num_rows($result) === 1 ){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //set session

            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;








}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="body2">
    <div class="data">
    <h1>HALAMAN LOGIN</h1>
    <?php
    if(isset($error)) : ?>
        <p style="color:red; font-style:italic;">username / password salah</p>;
    <?php endif;?>

    <form action="" method="post">

        <ul style="list-style:none;">
            <li>
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username" class="form_login">
            </li>
            <li>
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" class="form_login">
            </li>
            <li>
                <button type="submit" name="login" class="submit2">LOGIN</button>
            </li>
            <br>
            <li>BELUM PUNYA AKUN? <a href="registrasi.php" class="kembali">DAFTAR</a></li>
        </ul>


    </form>
    </div>
</body>
</html>
