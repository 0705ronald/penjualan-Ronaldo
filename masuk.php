<?php
include("koneksi.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email =$_POST['email'];
	$pass =md5($_POST['password']);
	
	session_start();
	if($email == "admin@admin.com" && $pass == md5("admin")){
		$_SESSION['email'] = $email;
		$_SESSION['status'] = 'online';
		echo "<meta http-equiv='refresh' content='0;./index.php' />";
	}else{
		$sql = "SELECT email from pelanggan WHERE email = '$email' and password = '$pass'";
		$result = mysqli_query($konek,$sql);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$_SESSION['email'] = $email;
			$_SESSION['status'] = 'online';
			echo "<meta http-equiv='refresh' content='0;./home.php' />";
			
		}else{
			echo '<script language="javascript">alert("Nama User dan Kata sandi salah") </script>';
			echo "<meta http-equiv='refresh' content='0;login.php' />";
		}
	}
	
	
}
?>