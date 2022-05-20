<?php
$servername = "localhost";
$database = "toko";
$username = "root";
$password = "";
// Create connection
$konek = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$konek) {
    die("koneksi gagal: " . mysqli_connect_error());
}

?>