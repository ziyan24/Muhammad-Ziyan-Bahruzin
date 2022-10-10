<?php

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari  ditekan

if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devisce-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="header">
    <h1>DATA MAHASISWA</h1>
</div>
<div class="countainer-navbar">
    <ul>
        <li><a href="index2.php" class="active2">HOME</a></li>
        <li><a href="accont.php" class="akun2">ACCOUNT</a></li>
        <li><a href="" class="keluar2">LOGOUT</a></li>
    </ul>
</div>

<br>
<div class="halaman-utama">
<h1>
    SELAMAT DATANG <br>
    DIDATA MAHASISWA
</h1>
</div>
</body>
</html>