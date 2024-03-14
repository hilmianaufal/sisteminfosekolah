<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Tambah Siswa - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";


$queryNis = mysqli_query($koneksi, "SELECT max(nis) as maxnis FROM tbl_siswa");
$data = mysqli_fetch_assoc($queryNis);
$maxNis = $data['maxnis'];
$noUrut = (int) substr($maxNis, 3,3);
$noUrut ++;
$maxNis = "NIS" . sprintf("%03s", $noUrut);



?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Siswa</li>
                        </ol>
             <form action="proses-siswa.php" method="post" enctype="multipart/form-data">

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
                                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" value="<?= $maxNis ?>"   class="form-control border-0 border-bottom" id="nis" name="nis" >
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" required class="form-control border-0 border-bottom" id="nama" name="nama">
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="kelas" id="kelas" required class="form-select border-0 border-bottom">
                                            <option value="" selected>--Pilih Kelas--</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div> 
                                   <div class="mb-3 row">
                                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jurusan" id="jurusan" required class="form-select border-0 border-bottom">
                                            <option value="" selected>--Pilih Jurusan--</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Pendidikan Islam">Pendidikan Islam</option>
                                            <option value="Sains Biologi">Sains Biologi</option>
                                        </select>
                                    </div> 
                                   </div>
                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
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