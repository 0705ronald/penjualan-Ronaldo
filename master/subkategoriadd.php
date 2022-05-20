<?php

if (isset($_POST['simpan'])) {
    $nama_sub_kategori = $_POST['nama_sub_kategori'];
    $id_kategori = $_POST['id_kategori'];
    $query_sql_insert = "INSERT into sub_kategori (nama_sub_kategori,id_kategori) values ('$nama_sub_kategori',$id_kategori)";
    $query_insert = mysqli_query($konek, $query_sql_insert);

    if ($query_insert) {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di simpan');
            window.location.href='index.php?type=subkategori';
        </script>");
    }

    
}
$query_sql_kategori = "SELECT * FROM kategori";
$query_kategori = mysqli_query($konek, $query_sql_kategori);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Sub Kategori</h3>
                </div>


                <form method="POST" action="index.php?type=master_kategori_add" class="p-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sub Kategori</label>
                        <input type="text" name="nama_sub_kategori" required class="form-control" id="exampleInputEmail1" placeholder="Masukan Sub Kategori">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Kategori</label>
                        <select required name="id_kategori" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option disabled selected>--- Pilih Kategori ---</option>
                            <?php
                            while ($kategori = mysqli_fetch_array($query_kategori)) {
                            ?>
                                <option value="<?= $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>



            </div>
            </form>