<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: auth/login.php");
    exit;
}

require_once "config.php";
$title = "Dashboard - Nurul Yaqin";
require_once "templates/header.php";
require_once "templates/navbar.php";
require_once "templates/sidebar.php";


$querySiswa= mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
$jmlSiswa = mysqli_num_rows($querySiswa);
$queryGuru= mysqli_query($koneksi, "SELECT * FROM tbl_guru");
$jmlGuru = mysqli_num_rows($queryGuru);

$queryLulus= mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian='Lulus'");
$jmlLulus = mysqli_num_rows($queryLulus);
$queryGagal= mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian='Gagal'");
$jmlGagal = mysqli_num_rows($queryGagal);

$nis = [];
$total = [];
while($data = mysqli_fetch_assoc($queryLulus)){
$nis[] = $data['nis'];
$total[] = $data['total_nilai'];
}


?>



<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Siswa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=$main_url ?>siswa/siswa.php"><?= $jmlSiswa ?> Orang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Guru</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=$main_url ?>guru/guru.php"><?= $jmlGuru ?> Orang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Siswa Lulus Ujian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=$main_url ?>ujian/ujian.php"><?= $jmlLulus ?> Orang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Siswa Gagal Ujian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=$main_url ?>ujian/ujian.php"><?= $jmlGagal ?> Orang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Rangking Siswa
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart"  height="60"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
           
            <script>
                // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($nis) ?>,
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?= json_encode($total) ?>,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

            </script>
<?php 

require_once "templates/footer.php";

?>