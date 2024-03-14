<?php
require_once"../config.php";

session_start();

if(isset($_SESSION['ssLogin'])){
    header("Location: index.php");
}



$sekolah = mysqli_query($koneksi, "SELECT * FROM tbl_sekolah WHERE id = 2");
$data = mysqli_fetch_array($sekolah);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Nurul Yaqin</title>
        <link href="<?= $main_url ?>asset/sb-admin/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?php echo $main_url ?>asset/image/graduated.png">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            #bgLogin {
                background-image: url("../asset/image/<?= $data['gambar'] ?>");
                background-size: cover;
                background-position: center center;
            }
        </style>

    </head>
    <body id="bgLogin">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Administrator</h3></div>
                                    <div class="card-body">
                                        <form action="proseslogin.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="username" type="text" placeholder="username" pattern="[A-Za-z0-9]{3,}" title="kombinasai angka minimal 3 karakakter" autocomplete="off" required/>
                                                <label for="username" >Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" minlength="4" name="password" required placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>

                                            <button type="submit" name="login" class="btn btn-primary col-12 rounded-pill my-2">Login</button>
    
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="text-muted small">Copyright &copy; Nurul Yaqin <?= date("Y")  ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
