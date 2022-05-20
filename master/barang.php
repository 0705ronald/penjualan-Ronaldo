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

$query_sql = "SELECT * FROM barang";
$query = mysqli_query($konek, $query_sql);

$query_sql_kategori = "SELECT * FROM kategori ";
$query_kategori = mysqli_query($konek, $query_sql_kategori);

$query_sql_sub_kategori = "SELECT * FROM sub_kategori ";
$query_sub_kategori = mysqli_query($konek, $query_sql_sub_kategori);

$query_sql_brands = "SELECT * FROM brands";
$query_brands = mysqli_query($konek, $query_sql_brands);

$query_sql_warna = "SELECT * FROM warna";
$query_sql_warna = mysqli_query($konek, $query_sql_warna);
?>

<div class="row">
  <div class="col-12">


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Barang</h3>
      </div>

      <table width="20px">
        <tr>
          <td> <a href="index.php?type=master_barangadd" class="btn btn-block btn-primary btn-sm">Tambah</a></td>
        </tr>
      </table>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Gambar Barang</th>
              <th>Sub Kategori</th>
              <th>Kategori</th>
              <th>Brands</th>
              <th>Warna</th>
              <th>ukuran</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            while ($barang = mysqli_fetch_array($query)) {
              $query_sql_kategori = "SELECT nama_kategori FROM kategori  WHERE id_kategori = " . $barang['id_kategori'];
              $query_kategori = mysqli_query($konek, $query_sql_kategori);
              $query_sql_sub_kategori = "SELECT nama_sub_kategori FROM sub_kategori  WHERE id_sub_kategori = " . $barang['id_sub_kategori'];
              $query_sub_kategori = mysqli_query($konek, $query_sql_sub_kategori);
              $query_sql_brands = "SELECT brands FROM brands WHERE id_brands = " . $barang['id_brands'];
              $query_brands = mysqli_query($konek, $query_sql_brands);
              $query_sql_warna = "SELECT warna FROM warna WHERE id_warna = " . $barang['id_warna'];
              $query_sql_warna = mysqli_query($konek, $query_sql_warna);
              $kategori = $barang['id_kategori'] > 0 ? mysqli_fetch_array($query_kategori)[0] : '';
              $sub_kategori = $barang['id_sub_kategori'] > 0 ? mysqli_fetch_array($query_sub_kategori)[0] : '';
              $brands = $barang['id_brands'] > 0 ? mysqli_fetch_array($query_brands)[0] : '';
              $warna = $barang['id_warna'] > 0 ? mysqli_fetch_array($query_sql_warna)[0] : '';
              $no++;
            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $barang['nama_barang'] ?></td>
                <td>
                  <img src="gambar-produk/<?= $barang['gambar'] ?>" alt="gambar produk" id="preview-img" class="img-fluid" width="100">
                </td>
                <td><?= $sub_kategori ?></td>
                <td><?= $kategori ?></td>
                <td><?= $brands ?></td>
                <td><?= $warna ?></td>
                <td><?php echo $barang['ukuran'] ?></td>
                <td><?php echo $barang['harga'] ?></td>
                <td><?php echo $barang['stok_barang'] ?></td>
                <td><?php echo $barang['status'] ?></td>
                <td><a href="index.php?type=master_barang_edit&id=<?php echo $barang['id_barang'] ?>">Edit</a> |
                  <a href="index.php?type=master_barang_delete&id=<?php echo $barang['id_barang'] ?>">Delete</a>
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
