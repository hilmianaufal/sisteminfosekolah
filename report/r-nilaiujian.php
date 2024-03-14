<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once"../config.php";

$noUjian = $_GET['noUjian'];

$queryUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE no_ujian = '$noUjian'");
$data = mysqli_fetch_assoc($queryUjian);

$content = '


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Nilai Ujian</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .title{
            text-align: center;

        }
        h3 {
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 30px;
        }
        .head-left {
            width: 100px;
            padding-left: 7px;
            padding-bottom: 5px;
        }
        .head-right {
            color: red;
        }
        hr {
            margin-bottom: 2px;
            margin-left: 5px;
        }
        
        .head-no {
            padding-left: 20px;
        }
        .head-mapel{
            width: 400px;
        }
        .head-nilai{
            width: 170px;
            text-align: center;
        }
        .data-no {
            margin-left: -20px;

        }
        .data-nilai{
            text-align: center;
        }
        .foot {
            padding-left: -20px;
            padding-bottom: 5px;

        }
        .sum-nilai {
            margin-left: -5px;
        }
        .sum-colom {
            margin-left: 6px;
        }
        .min-nilai {
            margin-left: -5px;
        }
        .min-colom{
            margin-left: 3px;
        }
        .max-colom {
            margin-left: 3px;
        }
        .max-nilai {
            margin-left: -5px;
        }
        .foot-nilai {
            margin-left: 2px;

        }
        .avg-nilai{
            margin-left: -5px;
        }
        .avg-colom {
            margin-left: 34px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h3> Laporan Nilai Ujian</h3>
        <h2>Nurul Yaqin</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th class="head-left">No Ujian</th>
                <th class="head-left">: '. $data['no_ujian'] .'</th>
                <th >Cirebon, '. date('j F Y') .'</th>
        
            </tr>
            <tr>
                <th class="head-left">Tgl Ujian</th>
                <th class="head-left">: '. date('d-m-Y' , strtotime($data['tgl_ujian'])) .'</th>
            </tr>
            <tr>
                <th class="head-left">NIS</th>
                <th class="head-left">: '. $data['nis'] .'</th>
            </tr>
            <tr>
                <th class="head-left">Jurusan</th>
                <th class="head-left">: '. $data['jurusan'].'</th>
                <th class="head-right">Hasil Ujian : '.$data['hasil_ujian'].' </th>
            </tr>
            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
            <tr>
                <th class="head-no">No</th>
                <th class="head-mapel">Mata Pelajaran</th>
                <th class="head-nilai">Nilai</th>
            </tr>
            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
        </thead>
        <tbody>
        ';
        $no = 1 ;
        $nilaiUjian = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_ujian WHERE no_ujian = '$noUjian' ");
        while($nilai = mysqli_fetch_assoc($nilaiUjian)){
            $content .= 
        
            '<tr>
                <td class="data-no">'.$no++.'</td>
                <td>'.$nilai['pelajaran'].'</td>
                <td class="data-nilai">'.$nilai['nilai_ujian'].'</td>
            </tr>';
        }
        $content .= 
       ' </tbody>
        <tfoot>
            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="foot"><span class="sum-nilai"> Total Nilai  </span> <span class="sum-colom">: '.$data['total_nilai'].'</span></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="foot"><span class="min-nilai"> Nilai Terendah  </span> <span class="min-colom">: '.$data['nilai_terendah'].'</span></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="foot"> <span class="max-nilai"> Nilai Tertinggi  </span> <span class="max-colom">: '.$data['nilai_tertinggi'].'</span><span class="foot-nilai"></span></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="foot"><span class="avg-nilai"> Rata-rata  </span> <span class="avg-colom">: '.$data['nilai_rata2'].'</span><span class="foot-nilai"></span></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
';

 require __DIR__.'/../asset/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
$html2pdf->output();

?> 
