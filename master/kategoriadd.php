<?php

if (isset($_POST['simpan'])){
    $nama_kategori=$_POST['nama_kategori'];
    $query_sql_insert="INSERT into kategori set nama_kategori='$nama_kategori'";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di simpan');
            window.location.href='index.php?type=kategori';
        </script>");
    }

}
    $query_sql_kategori="SELECT * FROM kategori";
    $query_kategori=mysqli_query($konek,$query_sql_kategori);


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>


<form method="POST" action="index.php?type=master_kategori_add">
     <div class="form-group">
            <label for="exampleInputEmail1">nama Kategori</label>
            <input type="text" name="nama_kategori" required class="form-control" id="exampleInputEmail1" placeholder="Masukan Kategori">

                    </div>

             <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>



     </div>
</form>