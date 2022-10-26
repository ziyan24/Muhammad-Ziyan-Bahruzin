<?php
require 'function.php';

if (isset($_POST["register"])){
    if (registrasi($_POST)> 0) {
        echo "<script>
               alert('user baru berhasil ditambahkan!');
               document.location.href = 'login.php';
              </script>";
    }else{
        echo mysqli_error($conn);
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN REGISTRASI</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        label {
            display : block;
        }
    </style>
</head>
<body class="body2">
    <div class="data">
    <h1>HALAMAN REGISTRASI</h1>

    <form action="" method="post">
        <ul style="list-style:none;">
            <li>
                <label for="username">USERNAME : </label>
                <input type="text" name="username" id="username" class="form_login">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email" class="form_login">
            </li>
            <li>
                <label for="pasword">PASSWORD : </label>
                <input type="password" name="password" id="password" class="form_login">
            </li>
            <li>
                <label for="pasword2">KONFIRMASI PASSWORD : </label>
                <input type="password" name="password2" id="password2" class="form_login">
            </li>
            <br>
            <li>
                <button type="submit" name="register" class="submit2">DAFTAR</button>
            </li>
            <br>
         
            <br>
            <li>SUDAH PUNYA AKUN?         <a href="login.php" class="kembali">LOGIN</a></li>
        </ul>
    </form>
    </div>


</body>
</html>
