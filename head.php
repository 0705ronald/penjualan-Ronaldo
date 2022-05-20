<div class="menu_atas">
	<div class="menu_atas_tengah">
		<ul>
		

		</ul>
	</div>

</div>
<div id="header">
	<center><a href="index.php"><img src="images/header.png"></a></center>
</div>

<div id="menu">
	<div class="menu">
		<ul><b>
			<li><a href = "index.php">Home</a></li>
			<li><a href = "tentang.php">Tentang</a></li>
			<li><a href = "Konfirmasi-pembayaran.php">Konfirmasi</a></li>
			<li><a href = "cek-resi.php">Cek Resi</a></li>
			<li><a href = "cek-transaksi.php">Cek Transaksi</a></li>
			<li><a href = "keranjang.php">Keranjang</a></li>
			<form action="cari.php" METHOD="GET">
			<li style="float:right;margin-top:-30px;"><input type="text" name="cari_produk" placeholder="Cari Produk Disini" required><small><select name="kategori" required><option value="" disabled selected>Pilih Kategori</option><option Value="Jam Tangan Pria">Jam Tangan Pria</option><option Value="Jam Tangan Wanita">Jam Tangan Wanita</option></select> </small><input type="image" name="submit" width="15px" height="15px" src="images/cari.png" border="0" alt="Submit" /></li>
			</form>	
		</b></ul>
	</div>
</div>

<div id="menu_2">
	<div class="menu_2">
	<?php
			
			require "konek_db.php";
			$panggil = mysqli_query("SELECT * FROM info ", $konek);
			$data = mysqli_fetch_array($panggil);
			
		?>
		<marquee>Info News : <?php echo $data['info1']; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Info News : <?php echo $data['info2']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Info News : <?php echo $data['info3']; ?></marquee>
	</div>
	
</div>

