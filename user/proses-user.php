<?php


require_once "../config.php";
session_start();

if(!isset($_SESSION['ssUser'])){
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_POST['simpan'])){

    $username = trim(htmlspecialchars($_POST['username']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $jabatan = $_POST['jabatan'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $image = trim(htmlspecialchars($_FILES['image']['name']));
    $password = 12345;
    $password = password_hash($password, PASSWORD_DEFAULT);


    // cek username

    $cekUsername = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE 
                                    username = '$username'");

    if(mysqli_num_rows($cekUsername)>0){
        header("Location: add-user.php?msg=cancel");
        return;
    }


    // upload gambar

    $gambar = $_FILES['image'];
    if($gambar !== null ){
        $url = "add-user.php";
        $gambar = uploading($url);
    }else {
        $gambar = "user.png";
    }

    mysqli_query($koneksi, "INSERT INTO tb_users  VALUES(null, '$username' , '$password', '$nama', '$alamat','$jabatan', '$image') ");


    header("Location: add-user.php?msg=added");
    return;



}



?>