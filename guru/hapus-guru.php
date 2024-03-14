<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$id = $_GET['id'];
$foto = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_guru WHERE id=$id ");

if($foto != 'default.jpg'){
    @unlink("../asset/image");
}


if (mysqli_affected_rows($koneksi)){
    header("Location: guru.php?msg=deleted");
}