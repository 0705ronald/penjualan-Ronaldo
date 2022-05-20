<?php


$id = $_GET["id"];
$query_sql="delete  FROM brands where id_brands=$id";
$query=mysqli_query($konek,$query_sql);

if ($query){
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Data berhasil di hapus');
        window.location.href='index.php?type=brands';
    </script>");
}


?>