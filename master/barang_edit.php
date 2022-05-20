<?php

if (isset($_POST['edit'])){
   
    $barang=$_POST['barang'];
    $id_barang=$_POST['id_barang'];
    $nama_barang=$_POST['nama_barang'];
    $ukuran=$_POST['ukuran'];
    $query_sql_insert=" update  barang set nama_barang='$nama_barang',ukuran='$ukuran' WHERE id_barang=$id_barang";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di update');
            window.location.href='index.php?type=barang';
        </script>");
    }

}

$id = $_GET["id"];
$query_sql="SELECT * FROM barang where id_barang=$id";
$query=mysqli_query($konek,$query_sql);
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Barang</h3>
                </div>
                <form method="POST" action="index.php?type=master_barang_edit">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="text" value="<?php echo $row['nama_barang'] ?>" required name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama barang">

                        <label for="exampleInputEmail1">Ukuran</label>
                        <input type="text" value="<?php echo $row['ukuran'] ?>" required name="ukuran" class="form-control" id="exampleInputEmail1" placeholder="Masukan ukuran">


                    </div>

                    <input type="hidden" value="<?php echo $row['id_barang'] ?>"  name="id_barang">
                    
                 <div class="card-footer">
                    <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>

                   
                   
                </form>
            </div>
        </div>
    </div>

</div>