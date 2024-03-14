<?php

require_once "../config.php";

session_start();
// Jika Tombol Login Di tekan

if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    

    $result = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username='$username' ");
    // cek username 

    
    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){

            $_SESSION['ssLogin'] = true;
            $_SESSION['ssUser'] = $username ;

            header("Location:../index.php");
            exit;
        }else{
            echo "<script> 
                alert('password Anda Salah...');
                document.location.href= 'login.php';
            
            </script>";
        }
    }else {
        echo "<script> 
        alert('Username Tidak Terdaftar...');
        document.location.href= 'login.php';
    
         </script>";
    }

}




?>