<html>

<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="background-color:#9bc535">


	<div id="login">
		<div class="header-login">Login Form</div>

		<?php
		require "konek_db.php";
		?>


		<form action="masuk.php" method="POST">
			<table class="tabel" border="0">

				<tr>
					<td><b>
							<h3>Email</h3>
						</b></td>
					<td><input class="inputan-login" type="email" name="email" /></td>
				</tr>
				<tr>
					<td><b>
							<h3>Password</h3>
						</b></td>
					<td><input class="inputan-login" type="password" name="password" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" class="tombol" value="Login" /></td>
				</tr>

			</table>

		</form>
		<div class="mx-auto container-fluid text-center">
			Belum Punya Akun ?
			<a href="daftar.php"> Daftar disini</a>
		</div>
	</div>
</body>

</html>