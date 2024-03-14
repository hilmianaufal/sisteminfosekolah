<?php
session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";



if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $kelas = $_POST['kelas'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $jurusan = $_POST['jurusan'];
    $image = trim(htmlspecialchars($_FILES['image']['name']));

    // upload gambar
    $gambar = $_FILES['image']['name'];
    if ($gambar !== '') {
        // Pastikan untuk memanggil fungsi uploading dengan parameter yang sesuai
        $url = "add-siswa.php";
        $gambar = uploading($url);
    } else {
        $gambar = "user.png";
    }

    // Kueri SQL untuk menyisipkan data ke dalam tabel
    $result = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nis, nama, alamat, kelas, jurusan, foto) VALUES ('$nis', '$nama', '$alamat', '$kelas', '$jurusan', '$gambar')");

    if ($result) {
        header("Location: siswa.php?msg=added");
        return;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
else if (isset ($_POST['update'])){

    $nis = $_POST['nis'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $kelas = $_POST['kelas'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $jurusan = $_POST['jurusan'];
    $foto = trim(htmlspecialchars($_POST['fotoLama']));

    if ($_FILES['image']['error'] === 4){
        $fotoSiswa = $foto;
        
    }else{
        $url = "siswa.php";
        $fotoSiswa = uploading($url);

        if($foto != 'default.jpg'){
            @unlink('../asset/image/' . $foto);
        }
    }

    $result = mysqli_query($koneksi, "UPDATE tbl_siswa SET 
                            nama = '$nama',
                            alamat = '$alamat',
                            kelas = '$kelas',
                            jurusan = '$jurusan',
                            foto = '$fotoSiswa' 
                            WHERE nis = '$nis'
    
                                ");

if ($result) {
    header("Location: siswa.php?msg=updated");
    return;
} else {
    echo "Error: " . mysqli_error($koneksi);
}
}

