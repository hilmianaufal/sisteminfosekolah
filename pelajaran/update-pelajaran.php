<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Edit Mata Pelajaran - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";


$pelajaran = mysqli_query($koneksi,"SELECT * FROM tbl_pelajaran ");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pelajaran WHERE id=$id");
$data = mysqli_fetch_assoc($query);





?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Mata Pelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="pelajaran.php">Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Edit Mata Pelajaran</li>
                        </ol>
                      <div class="row">

                        <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="fa-regular fa-square-plus"></i> Edit Pelajaran</span>
                            </div>
                            <div class="card-body">
                              <form action="proses-pelajaran.php" method="post">
                                  <input type="hidden" name="id" value="<?= $data['id']?>">

                                <div class="mb-3">
                                <label for="pelajaran" class="form-label ps-1 "> Mata Pelajaran</label>
                                <input name="pelajaran" value="<?= $data['pelajaran'] ?>" placeholder="Nama Pelajaran" required type="text" class="form-control" id="pelajaran" >
                                </div>

                                <div class="mb-3">
                                <label for="jurusan" class="form-label ps-1 ">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-select" required>
                                            <option value="">--Pilih Jurusan--</option>
                                            <?php
                                            $jurusan = ['Teknik Informtika', 'Pendidikan Islam', 'Sains Biologi'];
                                             foreach ($jurusan as $agm ) {
                                                if ($data['jurusan'] == $agm){  ?>
                                                  <option value="<?= $agm?>" selected><?= $agm?></option>
                                                  <?php }else { ?>
                                                    <option value="<?= $agm ?>"><?= $agm ?></option>
                                               <?php   
                                                }  
                                                    
                                                
                                             } ?>
                                             


                                             <?  ;?>  
                                    
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="guru" class="form-label ps-1 ">Guru</label>
                                <select name="guru" id="guru" class="form-select mb-3 " required>
                                    <option value="">--Pilih Guru--</option>
                                    <?php 
                                    $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                                
                                    while($dataGuru = mysqli_fetch_assoc($queryGuru)){  
                                        
                                        if($data['guru'] == $dataGuru['nama']){
                                        ?>
                              
                                        <option value="<?= $dataGuru['nama'] ?>" selected><?= $dataGuru['nama'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $dataGuru['nama'] ?>"><?= $dataGuru['nama'] ?></option>
                                            <?php }?>
                                        ?>
                                        <?php
                                    }?>  
                                    
                                                    
                                </select>
                        
                                <button type="submit" class="btn btn-primary" name="update"><i claas="fa-solid fa-floppy-disk"></i>Update</button>
                                <button type="submit" class="btn btn-danger  " name="reset"><i claas="fa-solid fa-xmark"></i>Reset</button>
                           
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
  
                                    <tr>
                                    <th scope="row"><?= $i?></th>
                                    <td><?= $data['pelajaran'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td><?= $data['guru']?></td>
                                    <td align="center">
                                      <button type="button" class="btn btn-warning btn-sm rounded-0 col-10"></i>Updating..</button>
                                    </td>
                                    </tr>
                                    

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
                            $(document).on('click', "#btnHpsPelajaran", function(){
                                $('#mdlHapus').modal('show');
                                let idPelajaran = $(this).data('id');
                                $('#btnHapus').attr('href', 'hapus-pelajaran.php?id=' + idPelajaran );
                            })
                        })           

            </script>


<?php require_once "../templates/footer.php" ?>