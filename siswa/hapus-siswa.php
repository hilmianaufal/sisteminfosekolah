<?php

session_start();

if (!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
}

require_once "../config.php";

$nis = $_GET['nis'];
$foto = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE nis = '$nis'");

if($foto != 'default.jpg'){
    @unlink('../asset/image/' );
}

if (mysqli_affected_rows($koneksi)){
    header("Location: siswa.php?msg=deleted");
}