<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_buku			= $_POST['id_buku'];
			$judul			= $_POST['judul'];
			$penulis	= $_POST['penulis'];
			$tahun_terbit		= $_POST['tahun_terbit'];

			$cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO buku (id_buku, judul, penulis, tahun_terbit) VALUES('$id_buku', '$judul', '$penulis', '$tahun_terbit')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_buku";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id_buku sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_buku" method="post">
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Penulis</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="penulis" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Terbit</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tahun_terbit" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
