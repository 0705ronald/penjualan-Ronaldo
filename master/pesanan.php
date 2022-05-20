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

$query_sql = "SELECT * FROM pesanan";
$query = mysqli_query($konek, $query_sql);

?>

<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pesanan</h3>
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
                                <td>
                                    <a href="index.php?type=master_detail_pesanan&id=<?php echo $pesanan['id_pesanan'] ?>">Detail</a> |
                                    <a href="ubahStatus.php?id=<?= $pesanan['id_pesanan'] ?>">Verifikasi</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>