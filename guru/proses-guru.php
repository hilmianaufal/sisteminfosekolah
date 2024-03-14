<?php

session_start();

if(!isset($_SESSION['ssLogin'])){
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])){
    $nip = trim(htmlspecialchars($_POST['nip']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $telepon = trim(htmlspecialchars($_POST['telepon']));
    $agama = trim(htmlspecialchars($_POST['agama']));
    $alamat =trim(htmlspecialchars($_POST['alamat']));
    $foto = trim(htmlspecialchars($_FILES['image']['name']));

    $cekNip=mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = '$nip'");

    if(mysqli_num_rows($cekNip)> 0 ){
        header("Location: guru.php?msg=cancel");
        return;
    }

    if($foto != ''){
        $url = "add-guru.php";
        $foto = uploading($url);
    }else {
        $foto = '../asset/image/default.jpg';
    }

    $result = mysqli_query($koneksi, "INSERT INTO tbl_guru VALUES ('', '$nama', '$alamat','$telepon','$agama','$foto','$nip')");

    if ($result){
        header("Location: guru.php?msg=added");
        return;
    }else {
        echo "ERROR : " . mysqli_error($koneksi);
    }

} else if (isset($_POST['update'])){
    $id = $_POST['id'];
    $nip = trim(htmlspecialchars($_POST['nip']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $telepon = trim(htmlspecialchars($_POST['telepon']));
    $agama = trim(htmlspecialchars($_POST['agama']));
    $alamat =trim(htmlspecialchars($_POST['alamat']));
    $foto = trim(htmlspecialchars($_POST['fotoLama']));


    $queryGuru=mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
    $data = mysqli_fetch_assoc($queryGuru);
    $curNip = $data['nip'];

    $newNip = mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = '$nip'");


    if($nip !== $curNip){
    if(mysqli_num_rows($newNip)> 0 ){
        header("Location: guru.php?msg=noupdated");
        return;
    }
}
            if ($_FILES['image']['error'] === 4){
                $fotoGuru = $foto;
                
            }else{
                $url = "guru.php";
                $fotoGuru = uploading($url);

                if($foto != 'default.jpg'){
                    @unlink('../asset/image/' . $foto);
                }
            }



    $result = mysqli_query($koneksi, "UPDATE tbl_guru SET 
                            nip = '$nip',
                            nama = '$nama',
                            telepon = '$telepon',
                            agama = '$agama',
                            alamat = '$alamat',
                            foto = '$fotoGuru' WHERE
                            id = $id
    ");

    if ($result){
        header("Location: guru.php?msg=updated");
    }else {
        echo "erorr" . mysqli_error($koneksi);
    }


}