<?php

if (isset($_POST['edit'])){
   
    $brands=$_POST['brands'];
    $id_brands=$_POST['id_brands'];
    $query_sql_insert=" update  brands set brands='$brands' WHERE id_brands=$id_brands";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di update');
            window.location.href='index.php?type=brands';
        </script>");
    }

}

$id = $_GET["id"];
$query_sql="SELECT * FROM brands where id_brands=$id";
$query=mysqli_query($konek,$query_sql);
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Brands</h3>
                </div>
                <form method="POST" action="index.php?type=master_brands_edit">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brands</label>
                        <input type="text" value="<?php echo $row['brands'] ?>" required name="brands" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama brands">
                    </div>

                    <input type="hidden" value="<?php echo $row['id_brands'] ?>"  name="id_brands">
                    
                 <div class="card-footer">
                    <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>

                   
                   
                </form>
            </div>
        </div>
    </div>

</div>