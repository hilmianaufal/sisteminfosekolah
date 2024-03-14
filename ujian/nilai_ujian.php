<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Nilai Ujian - Nurul Yaqin";
require_once "../templates/header.php";
require_once "../templates/navbar.php";
require_once "../templates/sidebar.php";

if (isset ($_GET['msg']) && isset($_GET['nis'])){
        $msg = $_GET['msg'];
        $nis = $_GET['nis'];
}else {
    $msg = '';
}
$alert = '';

if ($msg == 'Lulus'){

    $alert ='<div class="alert alert-success alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-circle-check"></i> Selamat .. Siswa Dengan NIS : '. $nis .' Berhasil Lulus Ujian
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if ($msg == 'Gagal'){

    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="fa-solid fa-xmark"></i> Siswa Dengan NIS : '. $nis .' Gagal Ujian
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

$queryNoUjian = mysqli_query($koneksi, "SELECT max(no_ujian) as maxno FROM tbl_ujian");
$data = mysqli_fetch_assoc($queryNoUjian);
$maxno = $data['maxno'];

$noUrut = (int) substr($maxno, 4, 3);
$noUrut++;
$maxno = "UTS-".sprintf("%03s", $noUrut);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-7">
                            <h1 class="mt-4">Nilai Ujian</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                                    <li class="breadcrumb-item "><a href="../ujian/ujian.php">Data Ujian</a></li>
                                    <li class="breadcrumb-item active">Nilai Ujian</li>
                                </ol>
                            </div>
                            <div class="col-md-5">
                                <div class="card mt-3 border-0">
                                    <h5>Syarat Kelulusan</h5>
                                    <ul class="ps-3">
                                        <li><small>Nilai Minimal Setiap Mata Pelajaran tidak Boleh Di bawah 50</small></li>
                                        <li><small>Nilai Rata-rata Setiap Mata Pelajaran tidak Boleh Di bawah 60</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <form action="proses-ujian.php" method="post">
                        <div class="row">
                        <?php if($msg !== ''){
                                    echo $alert;
                                } ?>
                            <div class="col-md-4">

                            <div class="card">

                                 <div class="card-header">
                                      <i class="fa fa-plus"></i>  Data Peserta Ujian
                                    </div>
                                    <div class="card-body">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-rotate fa-sm"></i></span>
                                        <input type="text" name="noUjian" value="<?= $maxno ?>" class="form-control bg-transparent" readonly>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days fa-sm"></i></span>
                                        <input type="date" name="tglUjian"  class="form-control " required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                                       <select name="nis" id="nis" class="form-select" required>
                                        <option value="">--Pilih NIS Siswa--</option>
                                        <?php
                                        $querySiswa = mysqli_query($koneksi, "SELECT* FROM tbl_siswa");
                                        while($data = mysqli_fetch_assoc($querySiswa)){ ?>
                                            <option value="<?= $data['nis'] ?>"><?= $data['nis'] ?>-<?= $data['nama'] ?></option>
                                        <?php } ?>
                                        ?>
                                       </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-location-arrow fa-sm"></i></span>
                                       <select name="jurusan" id="jurusan" class="form-select">
                                        <option value="">--Pilih Jurusan Siswa--</option>
                                        <option value="Teknik Informatika">Teknik Informtika</option>
                                        <option value="Pendidikan Islam">Pendidikan Islam</option>
                                        <option value="Sains Biologi">Sains Biologi</option>
                                       </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="card mt-2 ">
                                <div class="card-body  rounded">
                                    <div class="input-group ">
                                        <span class="input-group-text col-2 ps-2 fw-bold ">Sum</span>
                                        <input type="text" name="sum"  class="form-control bg-transparent" placeholder="Total Nilai" id="total_nilai" required>
                                    </div>
                                </div>
                                <div class="card-body  rounded">
                                    <div class="input-group ">
                                        <span class="input-group-text col-2 ps-2 fw-bold ">Min</span>
                                        <input type="text" name="min"  class="form-control bg-transparent" placeholder="Nilai Terendah" id="nilai_terendah" required>
                                    </div>
                                </div>
                                <div class="card-body  rounded">
                                    <div class="input-group ">
                                        <span class="input-group-text col-2 ps-2 fw-bold ">Max</span>
                                        <input type="text" name="max"  class="form-control bg-transparent" placeholder="Nilai Tertinggi" id="nilai_tertinggi" required>
                                    </div>
                                </div>
                                <div class="card-body rounded">
                                    <div class="input-group ">
                                        <span class="input-group-text col-2 ps-2 fw-bold ">Avg</span>
                                        <input type="text" name="average"  class="form-control bg-transparent" placeholder="Nilai Rata-rata" id="nilai_rata2" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                              <i class="i fa-solid fa-list"> </i> <span>Input Nilai Ujian</span>
                                              <button type="submit" name="simpan" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>  
                                              <button type="reset" name="reset" class="btn btn-sm btn-danger me-1  float-end"><i class="fa-solid fa-xmark"></i> Reset</button>  
                                            </div>
                                            <div class="card-body">
                                            <table class="table table-hover table-bordered">
                                            <thead> 
                                                <tr>
                                                    <th><center>No</center></th>
                                                    <th scope="col"><center>Mata Pelajaran</center></th>
                                                    <th scope="col"><center>jurusan</center></th>
                                                    <th scope="col"><center>Nilai Ujian</center></th>
                    
                              
                                                </tr>
                                            </thead>
                                            <tbody id="kejuruan">

                                            </tbody>
                                        </table>
                                            </div>
                                        </div>                                      
                            </div>
                        </div>
                        </form>
                    </div>
                </main>


<script>

     const jurusan = document.getElementById('jurusan');
     const mapelKejuruan = document.getElementById('kejuruan')
        
     jurusan.addEventListener('change', function(){
        let ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function (){
            if (ajax.readyState == 4  && ajax.status == 200 ){
                mapelKejuruan.innerHTML = ajax.responseText;
            }
        }
        ajax.open('GET', 'ajax-mapel.php?jurusan=' + jurusan.value, true )
        ajax.send();
     })

     const total = document.getElementById('total_nilai')
     const minValue = document.getElementById('nilai_terendah')
     const maxValue = document.getElementById('nilai_tertinggi')
     const average = document.getElementById('nilai_rata2')

     function fnHitung(){
        let nilaiUjian = document.getElementsByClassName('nilai')
        let totalNilai = 0;
        let listNilai = [];

        for (let i = 0; i < nilaiUjian.length; i++) {
            totalNilai = parseInt(totalNilai) + parseInt(nilaiUjian[i].value);
            total.value = totalNilai

            listNilai.push(nilaiUjian[i].value)

            listNilai.sort(function(a,b){
                return a-b
            })

            minValue.value = listNilai[0];
            maxValue.value = listNilai[listNilai.length -1]
            average.value = Math.round(totalNilai / listNilai.length)
            
        }
     }

</script>


<?php require_once "../templates/footer.php" ?>
