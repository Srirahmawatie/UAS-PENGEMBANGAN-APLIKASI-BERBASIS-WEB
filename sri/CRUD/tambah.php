<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$NIP			= $_POST['NIP'];
			$nama_guru			= $_POST['nama_guru'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jabatan		= $_POST['jabatan'];

			$cek = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO guru(NIP, nama_guru, jenis_kelamin, jabatan) VALUES('$NIP', '$nama_guru', '$jenis_kelamin', '$jabatan')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="NIP" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Guru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_guru" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
				<div class="col-md-6 col-sm-6">
					<select name="jabatan" class="form-control" required>
						<option value="">Pilih Jabatan</option>
						<option value="Kepala Sekolah">Kepala Sekolah</option>
						<option value="Operator">Operator</option>
						<option value="Guru Kelas 1">Guru Kelas 1</option>
						<option value="Guru Kelas 2">Guru Kelas 2</option>
						<option value="Guru Kelas 3">Guru Kelas 3</option>
						<option value="Guru Kelas 4">Guru Kelas 4</option>
						<option value="Guru Kelas 5">Guru Kelas 5</option>
						<option value="Guru Kelas 6">Guru Kelas 6</option>
						<option value="Penjaga Sekolah">Penjaga Sekolah</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
