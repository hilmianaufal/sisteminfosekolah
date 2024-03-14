<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])){
    $noUjian = trim(htmlspecialchars($_POST['noUjian']));
    $tgl = trim(htmlspecialchars($_POST['tglUjian']));
    $nis = trim(htmlspecialchars($_POST['nis']));
    $jurusan = trim(htmlspecialchars($_POST['jurusan']));
    $sum = trim(htmlspecialchars($_POST['sum']));
    $min = trim(htmlspecialchars($_POST['min']));
    $max = trim(htmlspecialchars($_POST['max']));
    $avg = trim(htmlspecialchars($_POST['average']));

    if ($min < 50 or $avg < 60 ){
        $hasilUjian = "Gagal";
    }else {
        $hasilUjian = "Lulus";
    }

    $mapel = $_POST['mapel'];
    $jrsn = $_POST['jurusn'];
    $nilai = $_POST['nilai'];
  
    mysqli_query($koneksi, "INSERT INTO tbl_ujian VALUES('$noUjian','$tgl','$nis','$jurusan',$sum,$min,$max,$avg, '$hasilUjian')");

    foreach($mapel as $key => $mpl){
        $nilai_siswa = mysqli_real_escape_string($koneksi, $nilai[$key]); // Membersihkan nilai
        $jurusan_siswa = mysqli_real_escape_string($koneksi, $jrsn[$key]); // Membersihkan jurusan siswa
    
        $query = "INSERT INTO tbl_nilai_ujian VALUES ('', '$noUjian', '$mpl', $nilai_siswa, '$jurusan_siswa')"; // Query SQL
    
        $result = mysqli_query($koneksi, $query); 

    }
    
    header("Location: nilai_ujian.php?msg=$hasilUjian&nis=$nis"); // Redirect ke halaman lain
    return;
    
    
}




?>