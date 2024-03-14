<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Siswa - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

$siswa = query("SELECT * FROM tbl_siswa");






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
if ($msg == 'updated'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Update Siswa Berhasil!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'deleted'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Siswa Berhasil di Hapus !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Siswa</li>
                        </ol>
                        <div class="card">
                            <?php 
                            if($msg !== ''){
                                echo $alert;
                            }else {
                                $alert ='';
                            }
                            ?>

                            <div class="card-header">
                                <span class="h5 my-2 "><i class="fa-solid fa-list-ul"></i> Siswa</span>
                                <a href="<?= $main_url ?>siswa/add-siswa.php" class="btn  btn-sm  btn-primary float-end "><i class="fa-solid fa-user-plus"></i> Tambah Siswa</a>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover " id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"><center>Foto</center></th>
                                    <th scope="col"><center>NIS</center></th>
                                    <th scope="col"><center>Nama</center></th>
                                    <th scope="col"><center>Kelas</center></th>
                                    <th scope="col"><center>Jurusan</center></th>
                                    <th scope="col"><center>Alamat</center></th>
                                    <th scope="col"><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach($siswa as $data) :?>
                                    <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><img src="../asset/image/<?= $data['foto']?>" class="rounded-circle" width="50px" height="50px" alt=""></td>
                                    <td><?= $data['nis'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['kelas'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td align="center">
                                        <a href="update-siswa.php?nis=<?=$data['nis']?>" name="update" class="btn btn-sm btn-warning"  title="update siswa"> <i class="fa-solid fa-pencil"></i></a>
                                        <button type="button" id="btnHapusSiswa" data-nis="<?= $data['nis'] ?>" data-foto ="<?= $data['foto'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>

                                    </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                </table>
                            </div>
                            </div>
                    </div>
                </main>

                <div class="modal" id="mdlHapus" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-siswa.php" id="btnHapus" class="btn btn-danger">Ya</a>
                </div>
                </div>
            </div>
            </div>

            <script>
  
                        $(document).ready(function(){
                            $(document).on('click', "#btnHapusSiswa", function(){
                                $('#mdlHapus').modal('show');
                                let idGuru = $(this).data('nis');
                                let fotoGuru = $(this).data('foto');
                                $('#btnHapus').attr('href', 'hapus-siswa.php?nis=' + idGuru + "&foto=" + fotoGuru);
                            })
                        })           

            </script>

<?php
require_once "../templates/footer.php";
?>