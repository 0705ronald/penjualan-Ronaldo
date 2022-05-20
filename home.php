<?php
include 'koneksi.php';
session_start();
if (isset($_GET['search'])) {
    $produk = $_GET['search'];
    $query_sql = "SELECT * FROM barang WHERE nama_barang = '$produk'";
    $query = mysqli_query($konek, $query_sql);
    $jumlah = mysqli_num_rows($query);
} else {
    $query_sql = "SELECT * FROM barang";
    $query = mysqli_query($konek, $query_sql);
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
    <title>Penjualan | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function detail(x) {
            window.location.href = 'detail.php?i=' + x;
        }
    </script>
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
            <div class="d-flex flex-row justify-content-end my-3 mx-auto w-75">
                <div class="ms-auto">
                    <form method="get" action="home.php">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search" name="search" aria-label="Search">
                            <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex flex-row flex-wrap justify-content-center my-2">
                <?php
                if (isset($_GET['search'])) {
                    if ($jumlah == 0) {
                ?>
                        <div class="container-fluid mt-5 text-center">
                            <h1>Hasil Tidak Ditemukan</h1>
                            <p>coba kata kunci lain</p>
                        </div>
                <?php
                    }
                }
                ?>
                <?php
                while ($barang = mysqli_fetch_array($query)) {
                    $id = $barang['id_barang'];
                    if (isset($_GET['search'])) {
                        if ($jumlah > 0) {
                ?>
                            <div class="w-100 bg-success text-white px-3 mb-3">
                                <span>Menampilkan <?= $jumlah ?> produk untuk hasil pencarian '<?= $produk ?>'</span>
                            </div>
                    <?php
                        }
                    } ?>

                    <div class="card mx-2 p-3 w-25 <?= ($barang['stok_barang'] > 0) ? 'selected' : '' ?>" <?= ($barang['stok_barang'] > 0) ? "onclick = detail($id)" : '' ?>>
                        <img src="gambar-produk/<?= $barang['gambar'] ?>" alt="">
                        <div class="card-body">
                            <p class="card-text"><?= $barang['nama_barang'] ?></p>
                            <h5 class="card-title">Rp. <?= $barang['harga'] ?></h5>
                        </div>
                        <div class="card-footer <?= ($barang['stok_barang'] > 0) ? 'text-success' : 'text-danger' ?>">
                            <p>Stok <?= ($barang['stok_barang'] > 0) ? 'tersisa ' . $barang['stok_barang'] . ' barang' : 'habis'   ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </section>
</body>

</html>