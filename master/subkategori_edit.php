<?php

if (isset($_POST['edit'])) {

    $nama_sub_kategori = $_POST['nama_sub_kategori'];
    $id_sub_kategori = $_POST['id_sub_kategori'];
    $query_sql_insert = " update  sub_kategori set nama_sub_kategori='$nama_sub_kategori' WHERE id_sub_kategori=$id_sub_kategori";
    $query_insert = mysqli_query($konek, $query_sql_insert);

    if ($query_insert) {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di update');
            window.location.href='index.php?type=sub_kategori';
        </script>");
    }
}

$id = $_GET["id"];
$query_sql = "SELECT * FROM sub_kategori where id_sub_kategori=$id";
$query = mysqli_query($konek, $query_sql);
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Sub Kategori</h3>
                </div>
                <form method="POST" action="index.php?type=master_subkategori_edit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Sub Kategori</label>
                            <input type="text" value="<?php echo $row['nama_sub_kategori'] ?>" required name="nama_sub_kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama sub kategori...">
                        </div>

                        <input type="hidden" value="<?php echo $row['id_sub_kategori'] ?>" name="id_sub_kategori">

                        <div class="card-footer">
                            <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                        </div>



                </form>
            </div>
        </div>
    </div>

</div>