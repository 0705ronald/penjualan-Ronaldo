<?php
include 'koneksi.php';
session_start();
if(isset($_GET['i'])){
    $id= $_GET['i'];
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .selected:hover {
        cursor: pointer;
        transform: scale(1.005);
        border: 1px solid green;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid w-75 mx-auto">
            <a class="navbar-brand" href="#">PENJUALAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php
                    if (True) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">Status Pesanan</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <?php
                        if (!isset($_SESSION['status'])) {
                        ?>
                            <a class="nav-link" href="login.php">Login</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="logout.php">Logout</a>
                        <?php
                        }
                        ?>
                    </li>
            </div>
        </div>
    </nav>
    <section>
        <main>
            <div class="container-fluid w-100 mx-auto my-auto h-screen">
                <div class="card p-3 w-50 mx-auto mt-5 ">
                    <div class="card-header">
                        <h1>Verifikasi Pembayaran anda</h1>
                    </div>
                    <div class="card-body text-center">
                        Silahkan lanjutkan pembayaran anda dengan menghubungi nomor Whatsapp admin toko melalui tombol dibawah
                    </div>
                    <div class="card-footer d-flex justify-content-center">

                        <button class="btn btn-success w-75">
                            <a href="https://wa.me/6281513474585?text=Halo%20min,%0Asaya%20ingin%20melakukan%20pembayaran%20dengan%20id%20pesanan%20:%20<?=$id?>" class="text-white text-decoration-none"> Lanjutkan Pembayaran </a>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </section>
</body>

</html>