<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['NIP'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$NIP = $_GET['NIP'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'") or die(mysqli_error($koneksi));

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
			$nama_guru			  = $_POST['nama_guru'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jabatan	= $_POST['jabatan'];

			$sql = mysqli_query($koneksi, "UPDATE guru SET nama_guru='$nama_guru', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan' WHERE NIP='$NIP'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_mhs&Nim=<?php echo $NIP; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="NIP" class="form-control" size="4" value="<?php echo $data['NIP']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Guru</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_guru" class="form-control" value="<?php echo $data['nama_guru']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Laki-Laki" <?php if($data['jenis_kelamin'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
				<div class="col-md-6 col-sm-6">
					<select name="jabatan" class="form-control" required>
						<option value="">Pilih Jabatan</option>
						<option value="Kepala Sekolah" <?php if($data['jabatan'] == 'Kepala Sekolah'){ echo 'selected'; } ?>>Kepala Sekolah</option>
						<option value="Operator" <?php if($data['jabatan'] == 'Operator'){ echo 'selected'; } ?>>Operator</option>
						<option value="Guru Kelas 1" <?php if($data['jabatan'] == 'Guru Kelas 1'){ echo 'selected'; } ?>>Guru Kelas 1</option>
						<option value="Guru Kelas 2" <?php if($data['jabatan'] == 'Guru Kelas 2'){ echo 'selected'; } ?>>Guru Kelas 2</option>
						<option value="Guru Kelas 3" <?php if($data['jabatan'] == 'Guru Kelas 3'){ echo 'selected'; } ?>>Guru Kelas 3</option>
						<option value="Guru Kelas 4" <?php if($data['jabatan'] == 'Guru Kelas 4'){ echo 'selected'; } ?>>Guru Kelas 4</option>
						<option value="Guru Kelas 5" <?php if($data['jabatan'] == 'Guru Kelas 5'){ echo 'selected'; } ?>>Guru Kelas 5</option>
						<option value="Guru Kelas 6" <?php if($data['jabatan'] == 'Guru Kelas 6'){ echo 'selected'; } ?>>Guru Kelas 6</option>
						<option value="Penjaga Sekolah" <?php if($data['jabatan'] == 'Penjaga Sekolah'){ echo 'selected'; } ?>>Penjaga Sekolah</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
