<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Guru - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";


$data = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
$rows = [];
while ($guru = mysqli_fetch_assoc($data)){
    $rows[] = $guru;
} 


if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}else{
    $msg = '';
}

$alert = '';


if ($msg == 'notimage'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah Guru Gagal, File Yang Anda Masukan Bukan Gambar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'oversize'){

    $alert ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-triangle-exclamation"></i> Tambah Guru Gagal, Ukuran Lebih dari 1 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>ss';
}
if ($msg == 'added'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Tambah Guru Berhasil
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'updated'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Update Guru Berhasil!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'deleted'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Guru Berhasil di Hapus !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'cancel'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Guru Gagal Di Tambahkan Karena NIP Sudah Ada !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'noupdated'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Guru Gagal Di Updated Karena NIP Sudah Ada !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>



<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Guru</li>
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
                                <span class="h5 my-2 "><i class="fa-solid fa-list-ul"></i> Guru</span>
                                <a href="<?= $main_url ?>guru/add-guru.php" class="btn  btn-sm  btn-primary float-end "><i class="fa-solid fa-user-plus"></i> Tambah Guru</a>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover " id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"><center>Foto</center></th>
                                    <th scope="col"><center>NIP</center></th>
                                    <th scope="col"><center>Nama</center></th>
                                    <th scope="col"><center>Telepon</center></th>
                                    <th scope="col"><center>Agama</center></th>
                                    <th scope="col"><center>Alamat</center></th>
                                    <th scope="col"><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =1 ?>
                                <?php foreach ($rows as $gr) :?>
                                    <tr>
                                    <th scope="row"><?= $i++ ?> </th>
                                    <td><img src="../asset/image/<?= $gr['foto']?>" width="40px" height="40px" alt="" class="rounded-circle"></td>
                                    <td><?= $gr['nip'] ?></td>
                                    <td><?= $gr['nama'] ?></td>
                                    <td><?= $gr['telepon'] ?></td>
                                    <td><?= $gr['agama'] ?></td>
                                    <td><?= $gr['alamat'] ?></td>
                                    <td>
                                        <a href="update-guru.php?id=<?= $gr['id'] ?>" name="update" class="btn btn-sm btn-warning"  title="update siswa"> <i class="fa-solid fa-pencil"></i></a>
                                        <button type="button" id="btnHapusSiswa" data-id="<?= $gr['id'] ?>" data-foto ="<?= $gr['foto'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>

                                    </td>
                                    </tr>
                                <?php endforeach ?>
                        
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
                                let idGuru = $(this).data('id');
                                let fotoGuru = $(this).data('foto');
                                $('#btnHapus').attr('href', 'hapus-guru.php?id=' + idGuru + "&foto=" + fotoGuru);
                            })
                        })           

            </script>

<?php
require_once "../templates/footer.php";
?>