<?php

require_once "../config.php";

session_start();

if(!isset($_SESSION['ssUser'])){
    header("Location: ../auth/login.php");
    exit;
}

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $email = trim(htmlspecialchars($_POST['email']));
    $status = $_POST['status'];
    $akreditasi = $_POST['akreditasi'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $visimisi = trim(htmlspecialchars($_POST['visimisi']));
    $gambarLama = trim(htmlspecialchars($_POST['gbrLama']));

    // Cek apakah gambsar baru diunggah
    if($_FILES['image']['error'] === 4){
        // Jika tidak ada gambar baru diunggah, gunakan gambar lama
        $gambarSekolah = $gambarLama;
    } else {
        // Jika ada gambar baru diunggah, lakukan proses upload gambar baru
        $url = 'profile-sekolh.php';
        $gambarSekolah = uploading($url);
        // Hapus gambar lama jika ada
        @unlink('../asset/image/' . $gambarLama);
    }

    // Persiapkan dan eksekusi query UPDATE
    $query = "UPDATE tbl_sekolah SET 
                nama = '$nama',
                email = '$email',
                status = '$status',
                akreditasi = '$akreditasi',
                alamat = '$alamat',
                visimisi = '$visimisi',
                gambar = '$gambarSekolah' 
              WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);
    if($result) {
        header("Location: profile-sekolh.php?msg=updated");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
