<?php
require 'koneksi.php';

$id = $_GET['i'];
$sql = "SELECT * FROM barang WHERE id_barang = '$id'";
$result = mysqli_query($konek, $sql);
$barang = mysqli_fetch_array($result);
$id_kategori = $barang['id_kategori'];
$id_brands = $barang['id_brands'];
$id_warna = $barang['id_warna'];
$query_sql_kategori = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
$query_kategori = mysqli_query($konek, $query_sql_kategori);
$kategori = mysqli_fetch_array($query_kategori);
$query_sql_brands = "SELECT * FROM brands WHERE id_brands = '$id_brands'";
$query_brands = mysqli_query($konek, $query_sql_brands);
$brands = mysqli_fetch_array($query_brands);
$query_sql_warna = "SELECT * FROM warna WHERE id_warna = '$id_warna'";
$query_warna = mysqli_query($konek, $query_sql_warna);
$warna = mysqli_fetch_array($query_warna);

?>


<!DOCTYPE html>
<html lang="en">

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
                    <li class="nav-item">
                        <?php
                        if (!isset($_SESSION['status'])) {
                        ?>
                            <a class="nav-link" href="login.php">Login</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="#">Logout</a>
                        <?php
                        }
                        ?>
                    </li>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-5 w-100">
        <div class="d-flex w-100 flex-row">
            <div class="w-50 pe-5">
                <img src="gambar-produk/<?= $barang['gambar'] ?>" alt="gambar produk" class="img-fluid">
            </div>

            <div class="card w-50">
                <h3 class="text-center fw-bold"><?= $barang['nama_barang'] ?></h3>
                <table class="w-50 ms-2">
                    <tr>
                        <td>Kategori</td>
                        <td>: <?= $kategori['nama_kategori'] ?></td>
                    </tr>
                    <tr>
                        <td>Brands </td>
                        <td>: <?= $brands['brands'] ?> </td>
                    </tr>
                    <tr>
                        <td>Warna </td>
                        <td>: <?= $warna['warna'] ?></td>
                    </tr>
                    <tr>
                        <td>Ukuran </td>
                        <td>: <?= $barang['ukuran'] ?></td>
                    </tr>
                    
                </table>
                <form class="mx-5 mt-auto mb-2" action="bayar.php" method="POST">
                    <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
                    <div class="form-group d-flex">
                        <input id="jumlah" class="form-control mb-3" style="width: 60%;" type="number" min=0 max="<?= $barang['stok_barang'] ?>" name="jumlah" placeholder="Jumlah yang ingin dipesan (Max <?= $barang['stok_barang'] ?>)">
                        <label class="ms-3 form-label fs-4">Rp. <?= $barang['harga'] ?></label>
                    </div>
                    <input type="submit" value="Pesan Sekarang" name="submit" class="form-control btn btn-success">
                </form>

            </div>
        </div>
    </div>
</body>

</html>