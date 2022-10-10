<?php
require 'function.php';

//ambil data di url

$id = $_GET["nim"];

//query data mahasiswa berdasarkan nim

$mhs = query("SELECT * FROM mahasiswa WHERE nim=$id")[0];





//cek tombol submit apakah sudah ditekan atau belum
if(isset($_POST["submit"])){


  
    
    //cek data apakah berhasil atau tidak
   if(edit ($_POST) > 0){
       echo "
        <script>
            alert('berhasil diubah');
            document.location.href = 'index.php';

        </script>
       ";
   }else{
       echo "
       <script>
            alert('gagal diubah');
            document.location.href = 'index.php';

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
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="body2">
    <div class="data">
    <h1>Edit Data Mahasiswa</h1>


    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
        <ul style="list-style-type:none;">
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"];?>" class="form_login">
            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"];?>" class="form_login">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"];?>" class="form_login">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"];?>" class="form_login">
            </li>
            <li>
                <label for="fakultas">FAKULTAS : </label>
                <input type="text" name="fakultas" id="fakutas" value="<?= $mhs["fakultas"];?>" class="form_login">
            </li>
            <li>
                <label for="gambar">GAMBAR : </label> <br>
                <img src="gambar/<?= $mhs['gambar']; ?>" width="40" class="img"><br>
                <input type="file" name="gambar" id="gambar" >
            </li>
            <br><br>
            <li>
                <button type="submit" name="submit" class="submit2">Edit Data</button>
            </li>
        </ul>
    </form>
    </div>

</body>
</html>