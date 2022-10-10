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
        <li><a href="index2.php" class="active">HOME</a></li>
        <li><a href="accont.php" class="akun">ACCOUNT</a></li>
        <li><a href="" class="keluar">LOGOUT</a></li>
    </ul>
</div>
<div class="cari">
<form action="" method="post">

        <input type="text" name="keyword" size="38" autofocus="" placeholder="MASUKAN KATA KUNCI" autocomplete="off">
        <button type="submit" name="cari">CARI </button>

</form>
</div>

<a href="tambah.php" class="tambah">Tambah Data Mahasiswa </a>

<br><br>
    


<br>
<div class="tabel">
<table border="1" cellpadding="10" cellspacing="0" >

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>fakultas</th>
            <th>Gambar</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $rows ) : ?>

        <tr>
            <td><?= $i; ?></td>
    
            <td>
                <a href="edit.php?nim=<?=  $rows["nim"];?>" class="edit">Edit</a> <br> <br><br>
                <a href="hapus.php?id=<?=  $rows["id"];?>" onclick="return confirm('Yakin ingin menghapus data?');" class="hapus">Hapus</a>

            </td>
           
            <td><?= $rows["nim"];?></td>
            <td><?= $rows["nama"];?></td>
            <td><?= $rows["email"];?></td>
            <td><?= $rows["jurusan"];?></td>
            <td><?= $rows["fakultas"];?></td>
            <td>
                <img src="gambar/<?=  $rows["gambar"];?>" width="50" alt="">
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

</table>
</div>
</body>
</html>