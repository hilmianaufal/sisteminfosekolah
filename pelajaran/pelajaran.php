<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Mata Pelajaran - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";


$pelajaran = mysqli_query($koneksi,"SELECT * FROM tbl_pelajaran ");



if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}else{
    $msg = '';
}

$alert = '';




if ($msg == 'added'){

    $alert ='<div class="alert alert-success alert-dismissible" style="display: none;" role="alert" id="added">
         <i class="fa-solid fa-circle-check"></i> Tambah Data Mata Pelajaran Berhasil
  </div>';
}
if ($msg == 'updated'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" id="updated" role="alert">
         <i class="fa-solid fa-circle-check"></i> Update Guru Berhasil!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'deleted'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" id="deleted" role="alert">
         <i class="fa-solid fa-xmark"></i>Data Mata Pelajaran Berhasil di Hapus !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'cancelupdate'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Data Pelajaran Gagal Di Update  !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


?>


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Mata Pelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Mata Pelajaran</li>
                        </ol>
                      <div class="row">
                      <?php 
                            if($msg !== ''){
                                echo $alert;
                            }else {
                                $alert ='';
                            }
                            ?>
                        <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="fa-regular fa-square-plus"></i> Tambah Pelajaran</span>
                            </div>
                            <div class="card-body">
                              <form action="proses-pelajaran.php" method="post">

                                <div class="mb-3">
                                <label for="pelajaran" class="form-label ps-1 ">Mata Pelajaran</label>
                                <input name="pelajaran" placeholder="Nama Pelajaran" required type="text" class="form-control" id="pelajaran" >
                                </div>

                                <div class="mb-3">
                                <label for="jurusan" class="form-label ps-1 ">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-select" required>
                                    <option value="">--Pilih Jurusan--</option>
                                    <option value="Teknik Informtika">Teknik Informtika</option>
                                    <option value="Pendidikan Islam">Pendidikan Islam</option>
                                    <option value="Sains Biologi">Sains Biologi</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="guru" class="form-label ps-1 ">Guru</label>
                                <select name="guru" id="guru" class="form-select mb-3 " required>
                                    <option value="">--Pilih Guru--</option>
                                    <?php 
                                    $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                    $rows = [];
                                    while($data = mysqli_fetch_assoc($queryGuru)){  ?>
                                        
                                        <option value="<?= $data['nama'] ?>"><?= $data['nama'] ?></option>
                                        <?php
                                    }?> 
                                                    
                                </select>
                        
                                <button type="submit" class="btn btn-primary" name="simpan"><i claas="fa-solid fa-pen"></i>Simpan</button>
                                <a type="submit" href="pelajaran.php" class="btn btn-danger  " ><i claas="fa-solid fa-xmark"></i>Reset</a>
                           
                                </div>

                              </form>
                            </div>
                            </div>


                        </div>



                        <div class="col-8">
                            <form action="add-pelajaran.php" method="post">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-table-list"></i> Data Pelajaran
                            </div>
                            <div class="card-body">
                            <table class="table" id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"><center>Mata Pelajaran</center></th>
                                    <th scope="col"><center>Jurusan</center></th>
                                    <th scope="col"><Center>Guru</Center></th>
                                    <th scope="col"><Center>Action</Center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php while($data = mysqli_fetch_assoc($pelajaran)){ ?>
                                    <tr>
                                    <th scope="row"><?= $i++?></th>
                                    <td><?= $data['pelajaran'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td><?= $data['guru']?></td>
                                    <td align="center">
                                        <a href="update-pelajaran.php?id=<?=$data['id'] ?>"  class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-clip"></i></a>
                                        <button type="button" id="btnHpsPelajaran" data-id="<?= $data['id']?>" name="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-square-xmark"></i></button>
                                    </td>
                                    </tr>
                                    
                                <?php }?> 
                                </tbody>
                                </table>
                            </div>
                            </div>
                            </form>
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
                    setTimeout(function(){
                    $('#added').fadeIn('slow');
                    },1000)
                    setTimeout(function(){
                        $('#added').fadeOut('slow');
                    },3000)
                })
                $(document).ready(function(){
                    setTimeout(function(){
                    $('#updated').fadeIn('slow');
                    },1000)
                    setTimeout(function(){
                        $('#updated').fadeOut('slow');
                    },3000)
                })
                $(document).ready(function(){
                    setTimeout(function(){
                    $('#deleted').fadeIn('slow');
                    },1000)
                    setTimeout(function(){
                        $('#deleted').fadeOut('slow');
                    },3000)
                })



  
                        $(document).ready(function(){
                            $(document).on('click', "#btnHpsPelajaran", function(){
                                $('#mdlHapus').modal('show');
                                let idPelajaran = $(this).data('id');
                                $('#btnHapus').attr('href', 'hapus-pelajaran.php?id=' + idPelajaran );
                            })
                        })           

            </script>


<?php require_once "../templates/footer.php" ?>