<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_buku'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_buku = $_GET['id_buku'];

			//query ke database SELECT tabel buku berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$judul			  = $_POST['judul'];
			$penulis	= $_POST['penulis'];
			$tahun_terbit	= $_POST['tahun_terbit'];

			$sql = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun_terbit' WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_buku";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_buku&id_buku=<?php echo $id_buku; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Buku</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_buku" class="form-control" size="4" value="<?php echo $data['id_buku']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Penulis</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Terbit</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_buku" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
