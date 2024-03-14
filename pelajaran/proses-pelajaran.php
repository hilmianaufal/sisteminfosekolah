<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])){
     $pelajaran = trim(htmlspecialchars($_POST['pelajaran']));
     $jurusan = $_POST['jurusan'];
     $guru = $_POST['guru'];
    
    $cekPelajaran = mysqli_query($koneksi,"SELECT * FROM tbl_pelajaran WHERE pelajaran= '$pelajaran'");

    if (mysqli_num_rows($cekPelajaran)>0){
        header("Location: pelajaran.php?msg=cancel");
        return;
    }

    $result = mysqli_query($koneksi, "INSERT INTO tbl_pelajaran VALUES ('','$pelajaran','$jurusan','$guru')");

    if($result){
        header("Location: pelajaran.php?msg=added");
        return;
    }else{
        echo "error :" . mysqli_error($koneksi);

    }

}
else if (isset($_POST['update'])){
    $id = $_POST['id'];
    $pelajaran = trim(htmlspecialchars($_POST['pelajaran']));
     $jurusan = $_POST['jurusan'];
     $guru = $_POST['guru'];

    $queryGuru = mysqli_query($koneksi,"SELECT * FROM tbl_pelajaran WHERE id = $id" );
    $dataPelajaran = mysqli_fetch_assoc($queryGuru);
    $data = $dataPelajaran['pelajaran'];

    $cekPelajaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE pelajaran = '$pelajaran'");

    if($pelajaran !== $data){
        if(mysqli_num_rows($cekPelajaran)>0){
            header("Location: pelajaran.php?msg=cancelupdate");
            return;
        }
    }

    $result = mysqli_query($koneksi, "UPDATE tbl_pelajaran SET 
                                        pelajaran = '$pelajaran',
                                        jurusan = '$jurusan',
                                        guru ='$guru' WHERE
                                        id = $id
    ");

        if ($result){
            header("Location: pelajaran.php?msg=updated");
        }else {
            echo "erorr" . mysqli_error($koneksi);
        }

}