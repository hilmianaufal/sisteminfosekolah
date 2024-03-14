<?php

session_start();


if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once '../config.php';

if (isset($_POST['submit'])){
    $curPass = trim(htmlspecialchars($_POST['curPass']));
    $newPass = trim(htmlspecialchars($_POST['newPass']));
    $confPass = trim(htmlspecialchars($_POST['confPass']));

    $userName = $_SESSION['ssUser'];

    $queryUser = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username= '$userName'");

    $data = mysqli_fetch_assoc($queryUser);

    if($newPass !== $confPass){
        header("Location: password.php?msg=err1");
        exit;
    }

    if (!password_verify($curPass, $data['password'])){
        header("Location: password.php?msg=err2");
        exit;
    }else{
        $pass = password_hash($newPass, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE tb_users SET password ='$pass' WHERE username = '$userName'");
        header("Location: password.php?msg=updated");
        exit;
    }
    
}

