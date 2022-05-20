<?php
$servername= "localhost";
$database= "penjualan";
$username= "root";
$password= "";

$konek= mysqli_connect($servername,$username,$password,$database);

    if (!$konek){
        echo "koneksi gagal";
    }
?>