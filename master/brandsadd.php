<?php

if (isset($_POST['simpan'])){
    $brands=$_POST['brands'];
    $query_sql_insert="INSERT into brands set brands='$brands'";
    $query_insert=mysqli_query($konek,$query_sql_insert);

    if ($query_insert){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data berhasil di simpan');
            window.location.href='index.php?type=brands';
        </script>");
    }

}
    $query_sql_brands="SELECT * FROM brands";
    $query_brands=mysqli_query($konek,$query_sql_brands);


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Brands</h3>
                </div>


<form method="POST" action="index.php?type=master_brandsadd">
     <div class="form-group">
            <label for="exampleInputEmail1">Brands</label>
            <input type="text" name="brands" required class="form-control" id="exampleInputEmail1" placeholder="Masukan brands">

                    </div>

             <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>



     </div>
</form>