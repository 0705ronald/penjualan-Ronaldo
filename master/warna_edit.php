<?php

if (isset($_POST['edit'])){
   
    $warna=$_POST['warna'];
    $id_warna=$_POST['id_warna'];
    $query_sql_insert=" update  warna set warna='$warna' WHERE id_warna=$id_warna";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di update');
            window.location.href='index.php?type=warna';
        </script>");
    }

}

$id = $_GET["id"];
$query_sql="SELECT * FROM warna where id_warna=$id";
$query=mysqli_query($konek,$query_sql);
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Warna</h3>
                </div>
                <form method="POST" action="index.php?type=master_warna_edit">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Warna</label>
                        <input type="text" value="<?php echo $row['warna'] ?>" required name="warna" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama warna">
                    </div>

                    <input type="hidden" value="<?php echo $row['id_warna'] ?>"  name="id_warna">
                    
                 <div class="card-footer">
                    <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>

                   
                   
                </form>
            </div>
        </div>
    </div>

</div>