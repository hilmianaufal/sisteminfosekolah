<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Data Ujian - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Ujian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Ujian</li>
                        </ol>
                        <div class="card">

                            <div class="card-header">
                                <span class="h5 my-2 "><i class="fa-solid fa-list-ul"></i> Data Ujian</span>
                                <a href="<?= $main_url ?>ujian/nilai_ujian.php" class="btn  btn-sm  btn-primary float-end "><i class="fa-solid fa-user-plus"></i> Tambah Data Ujian</a>
                                <div class="dropdown" style="margin-top:-30px; ">
                                    <button class="btn btn-success mx-2  btn-sm dropdown-toggle float-end" type="button" data-bs-toggle="dropdown"><i class="fa-solid fa-laptop-code"></i> Cetak</button>
                                    <ul class="dropdown-menu">
                                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mdlCetak"><i class="fa-solid fa-print"></i> Nilai Ujian</button></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><button type="button" onclick="printDocument()" class="dropdown-item"><i class="fa-solid fa-print"></i> Hasil Ujian</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover " id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col">No Ujian</th>
                                    <th scope="col"><center>NIS</center></th>
                                    <th scope="col"><center>Jurusan</center></th>
                                    <th scope="col"><center>Nilai Terendah</center></th>
                                    <th scope="col"><center>Nilai Tertinggi</center></th>
                                    <th scope="col"><center>Nilai Rata-rata</center></th>
                                    <th scope="col"><center>Hasil Ujian</center></th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1 ;  
                                    $queryNilai = mysqli_query($koneksi, "SELECT * FROM tbl_ujian");
                                   while($data = mysqli_fetch_assoc($queryNilai)){ ?>
                                    
                                    <tr>
                                    <th scope="row"><?= $data['no_ujian'] ?></th>
                                    <td> <?= $data['nis'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td ><center><?= $data['nilai_terendah'] ?></center></td>
                                    <td><center><?= $data['nilai_tertinggi'] ?></center></td>
                                    <td><center><?= $data['nilai_rata2'] ?></center></td>
                                    <td>
                                        <?php if($data['hasil_ujian'] == "Lulus") { ?>
                                            <button type="button" class="btn btn-success btn-sm rounded-0 col-12 fw-bold text-uppercase"><?= $data['hasil_ujian'] ?></button>
                                        <?php }else{ ?>
                                            <button type="button" class="btn btn-danger btn-sm rounded-0 col-12 fw-bold text-uppercase"><?= $data['hasil_ujian'] ?>
                                        <?php } ?>

                                    </td>
                                   
                                    </tr>   
                                  <?php } ?>
                                </tbody>
                                </table>
                            </div>
                            </div>

                    </div>
                </main>
                <div class="modal" tabindex="-1" id="mdlCetak">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                <label class="form-label">Pilih No Peserta Ujian</label>
                                <select name="no" id="no" class="form-select">
                                    <option value="">-- No Ujian ==</option>
                                    <?php 
                                    $dataUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian");
                                    while($data = mysqli_fetch_assoc($dataUjian)){ ?>

                                        <option value="<?= $data['no_ujian'] ?>"><?= $data['no_ujian'] ?> - <?= $data['nis'] ?> - <?= $data['jurusan'] ?></option>
                                        
                                    <?php } ?>
                               
                                </select>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-primary" onclick="previewPDF()">Ok</button>
                            </div>
                            </div>
                        </div>
                        </div>

                <script>
                    function printDocument(){
                        const myWindow = window.open("../report/r-ujian.php","","widht=900","height=600","left=100")
                    }

                    
                    function previewPDF() {
                        const noUjian = document.getElementById('no');

                        if (noUjian.value.trim() !== '') {
                            const url = "../report/r-nilaiujian.php?noUjian=" + encodeURIComponent(noUjian.value.trim());
                            const myWindow = window.open(url);
                            if (!myWindow) {
                                alert("Pembukaan jendela baru gagal. Pastikan popup tidak diblokir oleh browser Anda.");
                            }
                        } else {
                            alert("Silakan masukkan nomor ujian.");
                        }
                    }


                </script>

<?php

require_once"../templates/footer.php";

?>