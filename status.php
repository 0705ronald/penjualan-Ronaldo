<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


</head>
<style>
    #preview-img:hover {
        cursor: pointer;
    }

    #close-btn:hover {
        cursor: pointer;
    }
</style>

<?php
require 'koneksi.php';
session_start();
$email = $_SESSION['email'];
$query_sql_pelanggan = "SELECT id_pelanggan FROM pelanggan  WHERE email = '$email'";
$query_pelanggan = mysqli_query($konek, $query_sql_pelanggan);
$pelanggan = mysqli_fetch_array($query_pelanggan);
// var_dump();exit();

$id_pelanggan = $pelanggan['id_pelanggan'];

$query_sql = "SELECT * FROM pesanan where id_pelanggan = '$id_pelanggan'";
$query = mysqli_query($konek, $query_sql);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid w-75 mx-auto">
        <a class="navbar-brand" href="#">PENJUALAN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="home.php">Home</a>
                </li>
                <?php
                if (True) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Status Pesanan</a>
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

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Status Pesanan</b></h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Rekening</th>
                            <th>Nama Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Status Pembayaran</th>
                            <th>Total Pembayaran</th>
                            <th>Tanggal Pesanan</th>
                            <th>Waktu Pesanan</th>
                            <th>Status Pesanan</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($pesanan = mysqli_fetch_array($query)) {
                            $query_sql_pelanggan = "SELECT nama_lengkap FROM pelanggan  WHERE id_pelanggan = " . $pesanan['id_pelanggan'];
                            $query_pelanggan = mysqli_query($konek, $query_sql_pelanggan);
                            $pelanggan = mysqli_fetch_array($query_pelanggan);
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?= $pelanggan['nama_lengkap'] ?></td>
                                <td><?php echo $pesanan['nama_rekening'] ?></td>
                                <td><?php echo $pesanan['nama_bank'] ?></td>
                                <td><?php echo $pesanan['nomor_rekening'] ?></td>
                                <td><?php echo $pesanan['status_pembayaran'] ?></td>
                                <td><?php echo $pesanan['total_pembayaran'] ?></td>
                                <td><?php echo $pesanan['tanggal_pesanan'] ?></td>
                                <td><?php echo $pesanan['waktu_pesanan'] ?></td>
                                <td><?php echo $pesanan['status_pesanan'] ?></td>
                                <td><a href="verif.php?i=<?=$pesanan['id_pesanan']?>">Verifikasi Pembayaran</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>