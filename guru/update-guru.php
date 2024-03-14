<?php

session_start();

if (!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
}

require_once "../config.php";
$titie = "Update Guru - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

$id = $_GET['id'];

$guru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id= $id");
$data = mysqli_fetch_assoc($guru);


 ?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../guru/guru.php">Guru</a></li>
                            <li class="breadcrumb-item active">Update Guru</li>
                        </ol>
        <form action="proses-guru.php" method="post" enctype="multipart/form-data">

            <div class="card">
            <div class="card-header">
                <span class="h5"><i class="fa-solid fa-square-plus"></i> Update Guru</span>
                <button type="submit" name="update" class="btn btn-primary float-end "><i class="fa-solid fa-folder-plus"></i> Simpan</button>
                <button type="submit" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                    <div class="mb-3 row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="text" value="<?= $data['nip'] ?>"   class="form-control border-0 border-bottom" id="nis" name="nip" >
                            </div>
                        </div>
                    <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <input type="text" value="<?= $data['nama'] ?>" required class="form-control border-0 border-bottom" id="nama" name="nama">
                            </div>
                        </div>
                    <div class="mb-3 row">
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <input type="number" value="<?= $data['telepon'] ?>" required class="form-control border-0 border-bottom" id="telepon" name="telepon">
                            </div>
                        </div>
                    <div class="mb-3 row">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                            <select name="agama" id="kelas" required class="form-select border-0 border-bottom">
                            <?php
                                            $agama = ['Islam', 'Kristen', 'Budha'];
                                             foreach ($agama as $agm ) {
                                                if ($data['agama'] == $agm){  ?>
                                                  <option value="<?= $agm?>" selected><?= $agm?></option>
                                                  <?php }else { ?>
                                                    <option value="<?= $agm ?>"><?= $agm ?></option>
                                               <?php   
                                                }  
                                                    
                                                
                                             } ?>
                                             


                                             <?  ;?>   
                            </select>
                        </div> 

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9" style="margin-left: -50px;">
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="domisili" required cols="30" rows="3"><?= $data['alamat'] ?></textarea>
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
