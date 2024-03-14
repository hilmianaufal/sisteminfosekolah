<?php

require_once "../config.php";

session_start();

if(!isset($_SESSION['ssUser'])){
    header("Location: ../auth/login.php");
    exit;
}

$title = 'Nurul Yaqin';
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

$sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE id=2");
$data = mysqli_fetch_assoc($sekolah);

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}else{
    $msg = '';
}

$alert = '';


if ($msg == 'notimage'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Update Data Gagal, File Yang Anda Masukan Bukan Gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'oversize'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, Ukuran Lebih dari 1 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'updated'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Update Data Berhasil, 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}

?>

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Sekolah</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile Sekolah</li>
                        </ol>

                        <form action="proses-sekolah.php" method="post" enctype="multipart/form-data">
                        <?php
                        if($msg !== ''){
                            echo $alert;
                        }

                    ?>
                        <div class="card">
                        <div class="card-header">
                            <span class="h5"> <i class="fa-solid fa-pen"></i> Data Sekolah</span>
                            <button type="submit" name="simpan" class="btn btn-primary float-end"> <i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                            <button type="submit" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i>Reset</button>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-4 text-center px-5">
                                    <input type="hidden" name="gmbrLama" value="<?= $data['gambar'] ?>">
                                    <img src="../asset/image/<?= $data['gambar'] ?>" alt="" class="mb-3" width="100%">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    <small class="text-secondary">Pilih Gambar PNG, JPG atau JPEG dengan Ukuran Maximal 1 MB</small>
                                </div>
                                <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row" ">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9">
                                    <input type="text" style="margin-left: -50px;" name="nama"  class="form-control border-0 border-bottom" id="nama" value="<?= $data['nama'] ?>" required placeholder="Nama Sekolah">
                                    </div>
                                </div>
                                <div class="mb-3 row" ">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9">
                                    <input type="email" style="margin-left: -50px;" name="email" class="form-control border-0 border-bottom" id="email" value="<?= $data['email'] ?>" required placeholder="Email Sekolah">
                                    </div>
                                </div>
                                <div class="mb-3 row" ">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="status" class="col-sm-1 col-form-label">:</label>
                                 <div class="col-sm-9" style="margin-left: -50px;">
                                    <select name="status" class="form-select border-0 border-bottom" required id="status">
                                         <option value="Negri">Negri</option>
                                         <option value="Swasta">Swasta</option>
                                    </select>

                                 </div>
                                </div>
                                <div class="mb-3 row" ">
                                    <label for="akreditasi" class="col-sm-2 col-form-label">Akreditsi</label>
                                    <label for="akreditasi" class="col-sm-1 col-form-label">:</label>
                                 <div class="col-sm-9" style="margin-left: -50px;">
                                    <select name="akreditasi" class="form-select border-0 border-bottom" required id="akreditasi">
                                         <option value="A">A</option>
                                         <option value="B">B</option>
                                         <option value="C">C</option>
                                         <option value="D">D</option>
                                    </select>

                                 </div>
                                </div>

                                
                                <div class="mb-3 row" ">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                 <div class="col-sm-9" style="margin-left: -50px;">
                                    
                                    <textarea name="alamat" class="form-control" required id="alamat" cols="30" rows="3"><?= $data['alamat'] ?></textarea>
                                 </div>
                                </div>

                                <div class="mb-3 row" ">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Visi Misi</label>
                                    <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                 <div class="col-sm-9" style="margin-left: -50px;">
                                    
                                    <textarea name="visimisi" class="form-control" required id="visimisi" cols="30" rows="3"><?= $data['visimisi'] ?></textarea>
                                 </div>
                                </div>


                                </div>s
                            </div>
                        </div>
                        </form>
                        </div>
                     


<?php

require_once "../templates/footer.php";

?>