<?php
require 'function.php';




//cek tombol submit apakah sudah ditekan atau belum
if(isset($_POST["submit"])){

   
    
    //cek data apakah berhasil atau tidak
   if(tambah ($_POST) > 0){
       echo "
        <script>
            alert('berhasil ditambahkan');
            document.location.href = 'index2.php';

        </script>
       ";
   }else{
       echo "
       <script>
            alert('gagal ditambahkan');
            document.location.href = 'index2.php';

        </script>
        ";
   }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="body2">
    <div class="data">
    <h1>TAMBAH DATA MAHASISWA</h1>


    <form action="" method="post" enctype="multipart/form-data" >
        <ul style="list-style:none;">
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required class="form_login">
            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required class="form_login">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email" required class="form_login">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan" required class="form_login">
            </li>
            <li>
                <label for="fakultas">FAKULTAS : </label>
                <input type="text" name="fakultas" id="fakutas" required class="form_login">
            </li>
            <li>
                <label for="gambar">GAMBAR : </label>
                <input type="file" name="gambar" id="gambar" required class="form_login2">
            </li>
            <br>
            <li>
                <button type="submit" name="submit" class="submit2">Tambah Data</button>
            </li>
        </ul>
    </form>
    </div>

</body>
</html>