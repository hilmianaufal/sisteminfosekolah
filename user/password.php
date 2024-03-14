<?php 

require_once "../config.php";
session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

$title = "Ubah User";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

if (isset( $_GET['msg'])){
    $msg = $_GET['msg'];

}else{
    $msg ='';
}

$alert = '';
if ($msg == 'updated'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Password Berhasil Di Ganti
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if ($msg == 'err1'){

    $alert ='<div class="alert alert-warning alert-danger fade show" role="alert">
         <i class="fa-solid fa-circle-xmark"></i> Ganti Password Gagal, konfirmasi Pasword Tidak sama
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'err2'){

    $alert ='<div class="alert alert-warning alert-danger fade show" role="alert">
         <i class="fa-solid fa-circle-xmark"></i> Ganti Password Gagal, Password Lama Tidak Sesuai..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Ganti Password</li>
                        </ol>
                <form action="proses-password.php" method="post">
                    <?php if($msg !== ''){
                        echo $alert;
                    } ?>
                    <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"> <i class="fa-solid fa-pen-to-square"></i> Ganti Password</span>
                        <button type="submit" class="btn btn-primary float-end " name="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan </button>
                        <button type="reset" class="btn btn-danger float-end me-1" name="reset"><i class="fa-solid fa-xmark"></i> Riset </button>
                    </div>
                    <div class="card-body">
                    <div class="mb-3 row">
 
                    <div class="col-7">
                        <label for="curPass" class="form-label">Password Lama</label>
                        <input type="password" name="curPass" class="form-control" id="curPass" placeholder="Masukan Password Anda saat ini" required>
                    </div>
                    </div>
                    <div class="mb-3 row">
 
                    <div class="col-7">
                        <label for="newPass" class="form-label">Password Baru</label>
                        <input type="password" minlength="4" maxlength="20" required name="newPass" class="form-control" id="newPass" placeholder="Masukan Password Anda yang baru">
                    </div>
                    </div>
                    <div class="mb-3 row">
 
                    <div class="col-7">
                        <label for="confPass" class="form-label">Confirm Password</label>
                        <input type="password" minlength="4" maxlength="20" required name="confPass" class="form-control" id="newPass" placeholder="Ulangi Password Anda yang baru">
                    </div>
                    </div>
                    </div>
                </form>
                    </div>
                </main>


<?php
 
 require_once "../templates/footer.php";

?>
