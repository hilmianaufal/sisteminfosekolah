<?php

session_start();

if (!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
}

require_once "../config.php";
$titie = "Tambah Guru - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";
 ?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../guru/guru.php">Guru</a></li>
                            <li class="breadcrumb-item active">Tambah Guru</li>
                        </ol>
        <form action="proses-guru.php" method="post" enctype="multipart/form-data">

            <div class="card">
            <div class="card-header">
                <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Guru</span>
                <button type="submit" name="simpan" class="btn btn-primary float-end "><i class="fa-solid fa-folder-plus"></i> Simpan</button>
                <button type="submit" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                    <div class="mb-3 row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <input type="text" value=""   class="form-control border-0 border-bottom" id="nis" name="nip" >
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
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <input type="number" required class="form-control border-0 border-bottom" id="telepon" name="telepon">
                            </div>
                        </div>
                    <div class="mb-3 row">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                            <select name="agama" id="kelas" required class="form-select border-0 border-bottom">
                                <option value="" selected>--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                            </select>
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