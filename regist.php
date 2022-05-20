<?php
include("koneksi.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $sql = "SELECT email from pelanggan WHERE email = '$email'";
    $result = mysqli_query($konek, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        echo '<script language="javascript">alert("email sudah terdaftar") </script>';
        echo "<meta http-equiv='refresh' content='0;daftar.php' />";
    } else {    
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $provinsi = $_POST['provinsi'];
        $kode_pos = $_POST['kode_pos'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $password = md5($_POST['password']);
        $tanggal_registrasi = date('d/m/Y');
        
        $sql_insert = "INSERT into pelanggan (nama_lengkap,jenis_kelamin,alamat,kota,provinsi,kode_pos,nomor_telepon,email,password,tanggal_registrasi) values ('$nama','$jenis_kelamin','$alamat','$kota','$provinsi','$kode_pos','$nomor_telepon','$email','$password','$tanggal_registrasi')";
        $query_insert = mysqli_query($konek, $sql_insert);
        if ($query_insert) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Berhasil Mendaftar, silahkan login');
        </script>");
        echo "<meta http-equiv='refresh' content='0;login.php' />";
        } else {
            echo 'Error daftar pelanggan - cause : ' . mysqli_error($konek);
        }
    }
        
}
?>
