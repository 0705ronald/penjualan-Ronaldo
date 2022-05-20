<?php
require 'koneksi.php';
    $id = $_GET['id'];
    $query_sql_insert = "update pesanan set status_pembayaran ='Lunas', status_pesanan = 'Diproses' WHERE id_pesanan=$id";
    $query_insert = mysqli_query($konek, $query_sql_insert);
    if($query_insert){
        header('Location: ./index.php?type=pesanan');
    }else{
        echo 'error cause - '.mysqli_error($konek);
    }
?>