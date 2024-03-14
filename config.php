<?php
// buat koneksi
$koneksi = mysqli_connect("localhost", "root", "", "dbs_sekolah");

// pengecekan Koneksi
// if ( mysqli_connect_errno()){
//     echo "Gagal Koneksi Ke dalam Database";
// }else{
//     echo "Berhasil Terhubung ke Database";
// };

$main_url = "http://localhost/sekolah/";


function uploading($url){
    $namafile = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $eror = $_FILES['image']['error'];
    $tmp = $_FILES['image']['tmp_name'];
    
    // cek file yang ingin di upload
    $validExtension = ['jpg','jpeg','png'];
    $fileExtension = explode('.',$namafile);
    $fileExtension = strtolower(end($fileExtension));

    if(!in_array($fileExtension, $validExtension)){
        header("Location:" . $url . '?msg=notimage');
        die;
    }

    if($ukuran > 1000000){
        header("Location: " . $url . "?msg=oversize");
        die;
    }

    if($url == 'profile-sekolah.php') {
        $namafileterbru = rand(0,50) . 'bgLogin' . '.' . $fileExtension;
    }else {
        $namafileterbru = rand(10, 1000) . '.' . $namafile;
    }

    // generate nama file gambar
    $namafileterbru = rand(10, 1000) . '.' . $namafile;
    move_uploaded_file($tmp, "../asset/image/" . $namafileterbru);
    return $namafileterbru;

    


}

function query ($query){
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
        
    }
    return $rows;
}