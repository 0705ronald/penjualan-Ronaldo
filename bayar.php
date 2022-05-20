<?php
require 'koneksi.php';

if(isset($_POST['submit'])){

    $idBarang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    $sql = "SELECT * FROM barang WHERE id_barang = '$idBarang'";
    $result = mysqli_query($konek, $sql);
    $barang = mysqli_fetch_array($result);
}

session_start();
$email = $_SESSION['email'];
$sql_user = "SELECT * FROM pelanggan WHERE email = '$email'";
$result = mysqli_query($konek, $sql_user);
$user = mysqli_fetch_array($result);

if (isset($_POST['pesan'])) {
    $id_pelanggan = $user['id_pelanggan'];
    $nama_rekening = $_POST['namaRek'];
    $nomor_rekening = $_POST['noRek'];
    $nama_bank = $_POST['namaBank'];
    $total_pembayaran = $_POST['total'];
    $status_pembayaran = "Belum Bayar";
    $tanggal_pesanan = date('d-m-Y');
    $waktu_pesanan = date('G:i:s');

    $insert_pesanan = "INSERT INTO pesanan (id_pelanggan,nama_rekening,nama_bank,nomor_rekening,status_pembayaran,total_pembayaran,tanggal_pesanan,waktu_pesanan) values ($id_pelanggan,'$nama_rekening','$nama_bank','$nomor_rekening','$status_pembayaran',$total_pembayaran,'$tanggal_pesanan','$waktu_pesanan')";
    if (mysqli_query($konek, $insert_pesanan)) {
        $id_pesanan = mysqli_insert_id($konek);
        $idBarang = $_POST['idBarang'];
            $sql = "SELECT * FROM barang WHERE id_barang = '$idBarang'";
            $result = mysqli_query($konek, $sql);
            $barang = mysqli_fetch_array($result);
        $gambar_produk = $_POST['gambar'];
        $nama_produk = $barang['nama_barang'];
        $warna = $barang['id_warna'];
        $ukuran = $barang['ukuran'];
        $jumlah = $_POST['jumlah'];


        $insert_detail = "INSERT into detail_pesanan (id_pesanan,gambar_produk,nama_produk,warna,ukuran,jumlah,harga) values ($id_pesanan,'$gambar_produk','$nama_produk','$warna','$ukuran',$jumlah,$total_pembayaran)";

        if (mysqli_query($konek, $insert_detail)) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Pesanan anda sudah diterima, silahkan kunjungi halaman Status Pesanan untuk verifikasi pembayaran');
            window.location.href='status.php';
        </script>");
            header("Location: status.php");
        } else {
            echo $insert_detail;
            echo 'Error insert detail pesanan - cause : ' . mysqli_error($konek);
        }
    } else {
        echo 'Error insert pesanan - cause : ' . mysqli_error($konek);
    }

}


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
    <div class="container-fluid">
        <div class="card w-75 mt-5 mx-auto">
            <h2 class="text-center">Form Pemesanan</h2>
            <form method="POST" class="p-3 ">
                <div class="form-group ">
                    <label for="nama" class="form-label fw-bolder">Nama Lengkap</label>
                    <input id="nama" name="nama" class="form-control" type="text" value="<?= $user['nama_lengkap'] ?>" required>
                </div>
                <div class="form-group ">
                    <label for="namaRek" class="form-label fw-bolder">Nama Rekening</label>
                    <input id="namaRek" name="namaRek" class="form-control" type="text" value="" required>
                </div>
                <div class="form-group ">
                    <label for="namaBank" class="form-label fw-bolder">Nama Bank</label>
                    <input id="namaBank" name="namaBank" class="form-control" type="text" value="" required>
                </div>
                <div class="form-group ">
                    <label for="noRek" class="form-label fw-bolder">Nomor Rekening</label>
                    <input id="noRek" name="noRek" class="form-control" type="text" value="" required>
                </div>
                <label class="form-label fw-bolder">Barang dipesan :</label>
                <div class="d-flex">
                    <input type="hidden" name="idBarang" value="<?= $barang['id_barang'] ?>">
                    <div class="w-50 container-fluid">
                        <img class="img-fluid" src="gambar-produk/<?= $barang['gambar'] ?>" alt="gambar-produk">
                        <input type="hidden" name="gambar" value="<?= $barang['gambar'] ?>">
                    </div>
                    <div class="w-50 container-fluid">
                        <div class="form-group d-flex mb-2">
                            <label for="namaBarang" class="form-label w-50 fw-bolder">Nama Barang</label>
                            <input id="namaBarang" name="namaBarang" class="form-control" type="text" value="<?= $barang['nama_barang'] ?>" disabled>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label for="jumlah" class="form-label w-50 fw-bolder">Jumlah Barang</label>
                            <input id="jumlah" name="jumlah" class="form-control" type="text" value="<?= $jumlah ?>" readonly>
                        </div>

                        <div class="form-group d-flex mb-2">
                            <label for="harga" class="form-label w-50 fw-bolder">Harga Satuan</label>
                            <input id="harga" name="harga" class="form-control" type="text" value="<?= $barang['harga'] ?>" disabled>
                        </div>
                        <div class="form-group d-flex mb-2">
                            <label for="total" class="form-label w-50 fw-bolder mt-3">Total Harga</label>
                            <input id="total" name="total" class="form-control" type="text" value="<?= $jumlah * $barang['harga'] ?>" readonly>
                        </div>
                    </div>
                </div>
                <input id="submit" name="pesan" class="form-control btn btn-success btn-md my-3" type="submit" value="Pesan">
            </form>
        </div>
    </div>
</body>

</html>