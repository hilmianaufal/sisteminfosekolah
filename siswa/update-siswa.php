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




// update siswa
$nis = $_GET['nis'];

$datas = mysqli_query($koneksi,"SELECT * FROM tbl_siswa WHERE nis='$nis'");
$data = mysqli_fetch_assoc($datas);






?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="siswa.php">Siswa</a></li>
                            <li class="breadcrumb-item active">Update Siswa</li>
                        </ol>
             <form action="proses-siswa.php" method="post" enctype="multipart/form-data">

                        <div class="card">
                 <div class="card-header">
                            <span class="h5"><i class="fa-solid fa-square-plus"></i> Update Siswa</span>
                            <button type="submit" name="update" class="btn btn-primary float-end "><i class="fa-solid fa-folder-plus"></i> Update</button>
                            <button type="submit" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                   <div class="mb-3 row">
                                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" value="<?= $data['nis'] ?>"   class="form-control border-0 border-bottom" id="nis" name="nis" >
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" required value="<?= $data['nama'] ?>" class="form-control border-0 border-bottom" id="nama" name="nama">
                                        </div>
                                    </div>
                                   <div class="mb-3 row">
                                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="kelas" id="kelas" required class="form-select border-0 border-bottom">
                                        <?php
                                            $jurusan = ['X', 'XI', 'XII'];
                                             foreach ($jurusan as $jrs ) {
                                                if ($data['kelas'] == $jrs){  ?>
                                                  <option value="<?= $jrs?>" selected><?= $jrs?></option>
                                                  <?php }else { ?>
                                                    <option value="<?= $jrs ?>"><?= $jrs ?></option>
                                               <?php   
                                                }  
                                                    
                                                
                                             } ?>
                                             


                                             <?  ;?>   
                                        </select>
                                    </div> 
                                   <div class="mb-3 row">
                                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jurusan" id="jurusan" required class="form-select border-0 border-bottom">
                                        <?php
                                            $jurusan = ['Teknik Informatika', 'Pendidikan Islam', 'Sains Biologi'];
                                             foreach ($jurusan as $jrs ) {
                                                if ($data['jurusan'] == $jrs){  ?>
                                                  <option value="<?= $jrs?>" selected><?= $jrs?></option>
                                                  <?php }else { ?>
                                                    <option value="<?= $jrs ?>"><?= $jrs ?></option>
                                               <?php   
                                                }  
                                                    
                                                
                                             } ?>
                                             


                                             <?  ;?>  
                                        </select>
                                    </div> 
                                   </div>
                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <label class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" class="form-control"  required cols="30" rows="3"> <?= $data['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>

                                <div class="col-4 text-center px-5">
                                    <input type="hidden" name="fotoLama" >
                                    <img src="../asset/image/<?= $data['foto'] ?>" alt="user" class="mb-3" width="40%" >
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