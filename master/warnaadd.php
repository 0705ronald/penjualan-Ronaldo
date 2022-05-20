<?php

if (isset($_POST['simpan'])){
    $nama_warna=$_POST['nama_warna'];
    $query_sql_insert="INSERT into warna set warna='$nama_warna'";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di simpan');
            window.location.href='index.php?type=warna';
        </script>");
    }

}
    $query_sql_kategori="SELECT * FROM warna";
    $query_kategori=mysqli_query($konek,$query_sql_kategori);


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Warna</h3>
                </div>


<form method="POST" action="index.php?type=master_warnaadd">
     <div class="form-group">
            <label for="exampleInputEmail1">Warna</label>
            <input type="text" name="nama_warna" required class="form-control" id="exampleInputEmail1" placeholder="Masukan warna">

                    </div>

             <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>



     </div>
</form>