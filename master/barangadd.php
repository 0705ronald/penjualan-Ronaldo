<?php
if (isset($_POST['simpan'])) {
    $barang = $_POST['nama_barang'];
    $kategori = $_POST['id_kategori'];
    $subkategori = $_POST['id_sub_kategori'];
    $brands = $_POST['id_brands'];
    $harga = $_POST['harga'];
    $stok_barang = $_POST['stok_barang'];
    $tanggal = date('d/m/Y');
    $ukuran = $_POST['ukuran'];
    $warna = $_POST['warna'];
    $status = "Tersedia";

    // upload gambar
    $filename = $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_type = array("jpg", "jpeg", "png");
    if (in_array($imageFileType, $allowed_type)) {

        $nama_gambar = strtok($barang, " ") . '_' . date('dmy') . '_BA.' . $imageFileType;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], 'gambar-produk/' . $nama_gambar)) {
            $query_sql_insert = "INSERT into barang (nama_barang,id_kategori,id_sub_kategori,id_brands,ukuran,id_warna,gambar,harga,stok_barang,status,tanggal_dibuat) values ('$barang','$kategori', '$subkategori', '$brands','$ukuran',$warna,'$nama_gambar','$harga','$stok_barang','$status','$tanggal')";
            $query_insert = mysqli_query($konek, $query_sql_insert);
        } else {
            echo 'Error in uploading file - ' . $_FILES['image']['name'] . '. cause : ' . mysqli_error($konek);
        }
    }

    if ($query_insert) {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di simpan');
            window.location.href='index.php?type=master_barang';
        </script>");
    } else {
        echo 'Error insert barang - cause : ' . mysqli_error($konek);
    }
}

?>



<?php
$query_sql_kategori = "SELECT * FROM kategori";
$query_kategori = mysqli_query($konek, $query_sql_kategori);

$query_sql_subkategori = "SELECT * FROM sub_kategori";
$query_subkategori = mysqli_query($konek, $query_sql_subkategori);


$query_sql_brands = "SELECT * FROM brands";
$query_brands = mysqli_query($konek, $query_sql_brands);


$query_sql_warna = "SELECT * FROM warna";
$query_sql_warna = mysqli_query($konek, $query_sql_warna);




?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah data Barang</h3>
                </div>
                <form method="POST" action="index.php?type=master_barangadd" enctype='multipart/form-data'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" required name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama barang...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori Barang</label>
                            <select required name="id_kategori" class="custom-select rounded-0" id="exampleSelectRounded0">
                                <option disabled selected>--- Pilih Kategori Barang ---</option>
                                <?php
                                while ($kategori = mysqli_fetch_array($query_kategori)) {
                                ?>
                                    <option value="<?= $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Sub Kategori</label>
                            <select required name="id_sub_kategori" class="custom-select rounded-0" id="exampleSelectRounded0">
                                <option disabled selected>--- Pilih Sub Kategori ---</option>
                                <?php
                                while ($subkategori = mysqli_fetch_array($query_subkategori)) {
                                ?>
                                    <option value="<?= $subkategori['id_sub_kategori'] ?>"><?php echo $subkategori['nama_sub_kategori'] ?></option>
                                <?php
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Brands</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0" required name="id_brands">
                                <option disabled selected>--- Pilih Brands Barang ---</option>
                                <?php
                                while ($brands = mysqli_fetch_array($query_brands)) {
                                ?>
                                    <option value="<?= $brands['id_brands'] ?>"><?php echo $brands['brands'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Warna</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0" required name="warna">
                                <option disabled selected>--- Pilih Warna Barang ---</option>
                                <?php
                                while ($warna = mysqli_fetch_array($query_sql_warna)) {
                                ?>
                                    <option value="<?= $warna['id_warna'] ?>"><?php echo $warna['warna'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ukuran</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="ukuran" placeholder="Masukan Ukuran...">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" required name="harga" placeholder="Masukan harga...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok Barang</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" required name="stok_barang" placeholder="Masukan stok barang...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" required name="keterangan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Keterangan...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar Produk</label><br>
                            <input type="file" required name="image" id="file">
                        </div>

                        <div class="card-footer">
                            <button type="submit" required name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>