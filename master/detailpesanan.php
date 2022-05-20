<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

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

$id = $_GET["id"];
$query_sql = "SELECT * FROM detail_pesanan where id_pesanan=$id";
$query = mysqli_query($konek, $query_sql);

$query_sql = "SELECT * FROM pesanan";
$query_pesanan = mysqli_query($konek, $query_sql);

$query_sql_warna = "SELECT * FROM warna";
$query_sql_warna = mysqli_query($konek, $query_sql_warna);
$total = 0;
?>


<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pesanan</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar Produk</th>
                            <th>Nama Produk</th>
                            <th>Warna</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($detail = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>
                                    <img src="gambar-produk/<?= $detail['gambar_produk'] ?>" alt="gambar produk" id="preview-img" class="img-fluid" width="100">
                                </td>
                                <td><?php echo $detail['nama_produk'] ?></td>
                                <td><?php echo $detail['warna'] ?></td>
                                <td><?php echo $detail['ukuran'] ?></td>
                                <td><?php echo $detail['jumlah'] ?></td>
                                <td><?php echo $detail['harga'] ?></td>
                            </tr>
                        <?php
                            $total += $detail['harga'];
                        }
                        ?>
                        <tr>
                            <th colspan="6" style="text-align: center;">Jumlah</th>
                            <td><?=$total?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>