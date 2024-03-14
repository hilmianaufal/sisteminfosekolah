<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_pelajaran WHERE id = $id");

if (mysqli_affected_rows($koneksi)){
    header("Location: pelajaran.php?msg=deleted");
}