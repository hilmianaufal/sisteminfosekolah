<?php 

require_once "../config.php";
session_start();

if(!isset($_SESSION['ssUser'])){
    header("Location: ../auth/login.php");
    exit;
}

$title = "Tambah User";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";


if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}else{
    $msg = '';
}

$alert = '';

if ($msg == 'cancel'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, Username Already
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'notimage'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, File Yang Anda Masukan Bukan Gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'oversize'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, Ukuran Lebih dari 1 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'added'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Tambah User Berhasil, segera Ganti Password Anda !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
                        </ol>
             <form action="proses-user.php" method="post" enctype="multipart/form-data">
                    <?php
                        if($msg !== ''){
                            echo $alert;
                        }

                    ?>
                        <div class="card">
                 <div class="card-header">
                            <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah User</span>
                            <button type="submit" name="simpan" class="btn btn-primary float-end "><i class="fa-solid fa-folder-plus"></i> Simpan</button>
                            <button type="submit" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                   <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" required pattern="[A-Za-z0-9]{3,}" title="Minimal 3 Karakter Kombinasi huruf besar dan huruf Kecil dan Angka" class="form-control border-0 border-bottom" id="username" name="username" maxlength="20">
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Nama</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" required class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="20">
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Jabatan</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jabatan" id="jabatan" required class="form-select border-0 border-bottom">
                                            <option value="" selected>--Pilih Jabatan--</option>
                                            <option value="Kepsek">Kepsek</option>
                                            <option value="Staf TU">Staf TU</option>
                                            <option value="Guru">Guru Mata Pelajaran</option>
                                        </select>
                                    </div> 

                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Alamat</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="domisili" required cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                                <div class="col-4 text-center px-5">
                                    <img src="../asset/image/user.png" alt="user" class="mb-3" width="40%" >
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    <small class="text-secondary">Pilih Foto PNG, Jpg atau Jpeg dengan ukuran max 1 Mb </small>
                                    <div><small class="text-secondary">Widht = Height </small></div>
                                </div>
                            </div>
                        </div>

                             </div>
                        </form>
                    </div>

                </main>



<?php
 
 require_once "../templates/footer.php";

?>
