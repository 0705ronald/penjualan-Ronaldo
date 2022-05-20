<?php

if (isset($_POST['edit'])){
   
    $nama_kategori=$_POST['nama_kategori'];
    $id_kategori=$_POST['id_kategori'];
    $query_sql_insert=" update  kategori set nama_kategori='$nama_kategori' WHERE id_kategori=$id_kategori";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di update');
            window.location.href='index.php?type=kategori';
        </script>");
    }

}

$id = $_GET["id"];
$query_sql="SELECT * FROM kategori where id_kategori=$id";
$query=mysqli_query($konek,$query_sql);
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Kategori</h3>
                </div>
                <form method="POST" action="index.php?type=master_kategori_edit">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" value="<?php echo $row['nama_kategori'] ?>" required name="nama_kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama kategori...">
                    </div>

                    <input type="hidden" value="<?php echo $row['id_kategori'] ?>"  name="id_kategori">
                    
                 <div class="card-footer">
                    <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>

                   
                   
                </form>
            </div>
        </div>
    </div>

</div>