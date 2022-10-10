<?php
//koneksi database

$conn = mysqli_connect("localhost", "root", "", "dbmahasiswa");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}




function tambah($data){
    global $conn;
    //ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fakultas = htmlspecialchars($data["fakultas"]);

    // upload gambar

    $gambar = upload();

    if(!$gambar){
        return false;
    }


     //query insert data
     $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$jurusan', '$fakultas', '$gambar')";


     mysqli_query( $conn, $query );

     return mysqli_affected_rows($conn);
}


function upload(){
    
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES ['gambar']['error'];
    $tempat = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar ygg di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower (end ($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
                alert('yang anda upload bukan gambar!!!');
            </script>";

        return false;
    }
    //cek jika ukuran terlalu besar

    if($ukuranfile > 2000000){
        echo "<script>
                alert('UKURAN GAMBAR TERLALU BESAR!!!');
            </script>";
        return false;
    }
    //function untuk tidak boleh nama gambarnya sama 
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    

    //lolos pengecekan, gambar berhasil diupload
    move_uploaded_file($tempat, 'gambar/'. $namafilebaru);

    return $namafilebaru;


}




function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}


function edit($data){
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fakultas = htmlspecialchars($data["fakultas"]);

    $gambarlama = htmlspecialchars($data["gambarlama"]);

    //CEK APAKAH USER PILIH GAMBAR BARU ATAU TIDAK 
    if($_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarlama;
    }else {
        $gambar = upload();
    }
    


     //query insert data
     $query = "UPDATE mahasiswa SET nim='$nim', 
                                    nama='$nama', 
                                    email='$email', 
                                    jurusan='$jurusan', 
                                    fakultas='$fakultas', 
                                    gambar='$gambar'

                                    WHERE nim =$nim;

                            ";


     mysqli_query( $conn, $query );

     return mysqli_affected_rows($conn);
}


function cari($keyword){
    $query = "SELECT * FROM mahasiswa 
                        WHERE
                        nim LIKE '%$keyword%' OR
                        nama LIKE '%$keyword%' OR
                        email LIKE '%$keyword%' OR
                        jurusan LIKE '%$keyword%' OR
                        fakultas LIKE '%$keyword%'

                        ";
            return query($query);
}



function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    //cek username apakah sudah dipakai atau belum
    $result= mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");


    if(mysqli_fetch_assoc($result)){
        echo "<script>
                 alert('username sudah ada');
             </script>";

             return false;
    }

    // cek konfirmasi password
    if ($password !== $password2){
        echo "<script>
               alert('konfimasi password tidak sesuai!!');
              </script>";

              return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    //tambahkan user baru kedatabase
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);

}



?>